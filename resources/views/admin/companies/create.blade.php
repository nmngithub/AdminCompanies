@extends('admin.layout.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header text-primary">Công Ty >>
                    <small>Thêm</small>
                </h4>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if (session('notification'))

                <div class="alert alert-success">
                    {{session('notification')}} <br>
                </div> 
                @endif

                <form action="admin/companies/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên Công Ty</label>
                        <input type="text" class="form-control" name="name" required placeholder="Nhập tên công ty" value="{{old('name')}}"/>
                        @error('name')
                            <small class="form-text text-danger text-uppercase alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Nhập Email" value="{{old('email')}}"/>
                        @error('email')
                        <small class="form-text text-danger text-uppercase alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logo" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" name="website" required placeholder="Nhập Website" value="{{old('website')}}"/>
                        @error('website')
                        <small class="form-text text-danger text-uppercase alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
