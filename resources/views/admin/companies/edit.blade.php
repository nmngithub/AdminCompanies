@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header text-primary">Chỉnh sửa Công ty >>
                    <small>{{$Companies->name}}</small>
                </h4>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

              @if (session('notification'))
                  <div class="alert alert-success">
                      {{session('notification')}}
                  </div>
              @endif
                <form action="admin/companies/update/{{$Companies->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Tên Công Ty</label>
                            <input type="text" class="form-control" name="name" required value="{{$Companies->name}}"/>
                            @error('name')
                                <small class="form-text text-danger text-uppercase alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required value="{{$Companies->email}}"/>
                            @error('email')
                            <small class="form-text text-danger text-uppercase alert">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <img src="{{ asset('storage/'.$Companies->logo) }}" width="100px" height="100px" alt="">
                            <input type="file" class="form-control" name="logo">
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" class="form-control" name="website" required placeholder="Nhập Website" value="{{$Companies->website}}"/>
                            @error('website')
                            <small class="form-text text-danger text-uppercase alert">{{ $message }}</small>
                            @enderror
                        </div>

                    <button type="submit" class="btn btn-default">Lưu</button>                    
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
