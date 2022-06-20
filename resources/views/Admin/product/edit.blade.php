@extends('Admin.master')
@section('title','QUẢN LÝ SẢN PHẨM')
@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3>Cập nhật thông tin sản phẩm</h3>
        </div>
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <form method="POST" action="{{route('product.update',$pro->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$pro->name}}">
                                @error('name')
                                <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" name="file">
                                @error('file')
                                <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                                <img src="{{url('upload')}}/{{$pro->image}}" alt="" style="width:100px">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">danh mục sản phẩm</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($cate as $value)
                                    <option value="{{$value->id}}" {{$value->id == $pro->category_id ? 'selected' : ''}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="2" {{$pro->status == 2 ? 'checked' : ''}}>Nổi bật
                                </div>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="1" {{$pro->status == 1 ? 'checked' : ''}}>Hiện
                                </div>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="0" {{$pro->status == 0 ? 'checked' : ''}}>Ẩn
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả sản sản phẩm</label>
                                <textarea name="description" id="editor1" rows="10" cols="80">
                                {{$pro->description}}
                                </textarea>
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