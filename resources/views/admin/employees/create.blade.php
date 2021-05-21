@extends('admin.layout.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header text-primary">Công ty >>
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

                <form action="admin/employees/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstName" required placeholder="Nhập First Name" value="{{old('firstName')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastName" required placeholder="Nhập Last Name" value="{{old('lastName')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <select name="companyId" class="form-control" required>
                            <option value="">----------</option>
                            @foreach ($Companies as $item)
                                <option value="{{$item->id}}" @if (old('companyId') == $item->id) selected="selected" @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Nhập Email" value="{{old('email')}}"/>
                        @error('email')
                            <small class="form-text text-danger text-uppercase alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="phone" required placeholder="Nhập SĐT" value="{{old('phone')}}"/>
                        @error('phone')
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
