@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
     
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header text-primary">Công Ty >>
                    <small>Danh Sách</small>
                </h4>
            </div>
            @if (session('notification'))
            <div class="alert alert-success">
                {{session('notification')}}
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody> 
                  
                    @foreach ($Companies as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <img src="{{ asset('storage/'.$item->logo) }}" width="100px" height="100px" alt="">
                            </td>
                            <td>{{$item->website}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/companies/delete/{{$item->id}}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/companies/edit/{{$item->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                    
    
                </tbody>
            </table>
            {{$Companies->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
