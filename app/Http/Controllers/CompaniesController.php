<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CompaniesRequest;
use App\Models\Companies;

class CompaniesController extends Controller
{
    public function index(){
        $Companies = Companies::orderBy('id','ASC')->paginate(10);
        return view('admin.companies.index',['Companies'=>$Companies]);
    }

    public function create(){
        return view('admin.companies.create');
    }

    public function store(CompaniesRequest $req){
        $Companies = new Companies;

        $Companies->name = $req->name;
        $Companies->email = $req->email;

        if($req->hasFile('logo')){
            $file = $req->file('logo');
            $format = $file->getClientOriginalExtension();
            if($format != 'jpg' && $format != 'png'){
                return redirect()->back()->with('notification','Hình ảnh phải có định dạng là jpg hoặc png!');
            }
            $name = $file->getClientOriginalName();
            while(file_exists('./storage/'.$name)){
                $name = Str::random(4)."_".$name;
            }
            $file->move('./storage/',$name);
            $Companies->logo = $name;
        } else{
            $Companies->logo ="";
        }

        $Companies->website = $req->website;

        $Companies->save();

        return redirect()->back()->with('notification','Thêm thành công!');
    }

    public function edit($id){
        $Companies = Companies::find($id);
        
        return view('admin.companies.edit',['Companies'=>$Companies]);
    }

    public function update(CompaniesRequest $req, $id){
        $Companies = Companies::find($id);

        $Companies->name = $req->name;
        $Companies->email = $req->email;

        if($req->hasFile('logo')){

            $file = $req->file('logo');
            $format = $file->getClientOriginalExtension();
            if($format != 'jpg' && $format != 'png'){
                return redirect()->back()->with('notification','Hình ảnh phải có định dạng là jpg hoặc png!');
            }

            while(file_exists(storage_path('app/public/'.$Companies->logo))){
                unlink(storage_path('app/public/'.$Companies->logo));
            }
       
            $name = $file->getClientOriginalName();
            while(file_exists('./storage/'.$name)){
                $name = Str::random(4)."_".$name;
            }
            $file->move('./storage/',$name);


            $Companies->logo = $name;
        }

        $Companies->website = $req->website;
        $Companies->save();

        return redirect()->back()->with('notification','Sửa thành công!');
    }

    public function delete($id){
        $Companies = Companies::find($id);
   
        $Employees = $Companies->employees()->delete();
        
        if(!empty($Companies->logo)){
            while(file_exists(storage_path('app/public/'.$Companies->logo))){
                unlink(storage_path('app/public/'.$Companies->logo));
            }
        }
       
        $Companies->delete();
        
        return redirect()->back()->with('notification','Xóa thành công!');
    }
}
