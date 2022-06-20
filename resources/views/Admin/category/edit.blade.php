@extends('Admin.master')
@section('title','QUẢN LÝ DANH MỤC SẢN PHẨM')
@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3>Sửa danh mục</h3>
        </div>
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$cate->name}}">
                                @error('name')
                                <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="1" {{$cate->status==1 ? 'checked' : ''}}>Hiện
                                </div>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="0" {{$cate->status==0 ? 'checked' : ''}}>Ẩn
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
@stop