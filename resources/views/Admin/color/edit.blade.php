@extends('Admin.master')
@section('title','QUẢN LÝ MÀU SẮC SẢN PHẨM')
@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3>Cập nhật màu sắc sản phẩm</h3>
        </div>
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <form method="POST" action="{{route('color.update',$color->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên màu</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$color->name}}">
                                @error('name')
                                <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="1" {{$color->status == 1 ? 'checked' : ''}}>Hiện
                                </div>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="0" {{$color->status == 0 ? 'checked' : ''}}>Ẩn
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Cập nhật</button>
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
@section('ckeditor_js')
    <script src="{{url('access')}}/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@stop