@extends('Admin.master')
@section('title','QUẢN LÝ BIẾN THỂ SẢN PHẨM')
@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3>Cập nhật biến thể sản phẩm</h3>
        </div>
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <form method="POST" action="{{route('product_detail.update',$pro_det->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <select name="product_id" id="" class="form-control">
                                    @foreach($pro as $value)
                                    <option value="{{$value->id}}" {{$value->id == $pro_det->product_id ? 'selected' : ''}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" name="file">
                                @error('file')
                                <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                                <img src="{{url('upload')}}/{{$pro_det->image}}" alt="" style="width:100px">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{$pro_det->price}}">
                                @error('price')
                                <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá khuyến mại</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="sale_price" value="{{$pro_det->sale_price}}">
                                @error('sale_price')
                                <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Màu</label>
                                <select name="color_id" id="" class="form-control">
                                    @foreach($color as $value)
                                    <option value="{{$value->id}}" {{$value->id == $pro_det->color_id ? 'selected' : ''}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">size</label>
                                <select name="size_id" id="" class="form-control">
                                    @foreach($size as $value)
                                    <option value="{{$value->id}}" {{$value->id == $pro_det->size_id ? 'selected' : ''}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="1" {{$pro_det->status == 1 ? 'checked' : ''}}>Hiện
                                </div>
                                <div>
                                    <input type="radio" class="" id="exampleInputPassword1" name="status" value="0" {{$pro_det->status == 0 ? 'checked' : ''}}>Ẩn
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