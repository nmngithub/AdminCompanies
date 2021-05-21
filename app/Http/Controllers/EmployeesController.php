<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeesRequest;
use App\Models\Employees;
use App\Models\Companies;

class EmployeesController extends Controller
{
    public function index(){
        $Employees = Employees::orderBy('id','ASC')->paginate(10);
       
        return view('admin.employees.index',['Employees'=>$Employees]);
    }

    public function create(){
        $Companies = Companies::select('id','name')->get();
        return view('admin.employees.create',['Companies'=>$Companies]);
    }

    public function store(EmployeesRequest $req){
        $Employees = new Employees;

        $Employees->firstname = $req->firstName;
        $Employees->lastname = $req->lastName;
        $Employees->company_id = $req->companyId;
        $Employees->email = $req->email;
        $Employees->phone = $req->phone;
        $Employees->save();

        return redirect()->back()->with('notification','Thêm thành công!');
    }

    public function edit($id){
        $Employees = Employees::find($id);
        $Companies = Companies::select('id','name')->get();
        return view('admin.Employees.edit',['Employees'=>$Employees,'Companies'=>$Companies]);
    }

    public function update(EmployeesRequest $req, $id){
        $Employees = Employees::find($id);

        $Employees->firstname = $req->firstName;
        $Employees->lastname = $req->lastName;
        $Employees->company_id = $req->companyId;
        $Employees->email = $req->email;
        $Employees->phone = $req->phone;
        $Employees->save();

        return redirect()->back()->with('notification','Sửa thành công!');
    }

    public function delete($id){
        $Employees = Employees::find($id);

        $Employees->delete();
        return redirect()->back()->with('notification','Xóa thành công!');
    }
}
