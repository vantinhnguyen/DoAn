@extends('Admin.master')
@section('title','QUẢN LÝ BIẾN THỂ SẢN PHẨM')
@section('content')
<div class="box">
<div class="box-header with-border">
          @if(Session::has('ss'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{Session::get('ss')}}</strong>
          </div>
          @endif
          <a href="{{route('product_detail.create')}}" class="btn btn-info">Thêm biến thể sản phẩm mới</a>
        </div>
        <div class="box-body">
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Ảnh</th>
                      <th>Giá</th>
                      <th>Giá khuyến mại</th>
                      <th>Màu</th>
                      <th>Size</th>
                      <th>Trạng thái</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($pro_det as $value)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$value->product->name}}</td>
                      <td><img src="{{url('upload')}}/{{$value->image}}" alt="" style="width:100px"></td>
                      <td>{{number_format($value->price,0, ',', '.')}} đ</td>
                      <td>{{number_format($value->sale_price,0, ',', '.')}} đ</td>
                      <td>{{$value->color->name}}</td>
                      <td>{{$value->size->name}}</td>
                      <td>{{$value->status==1 ? 'Hiện' : 'Ẩn'}}</td>
                      <td>
                          <form action="{{route('product_detail.destroy',$value->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('product_detail.edit',$value->id)}}" class="btn btn-info">Sửa</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa biết thể sản phẩm này không?')">Xóa</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{ $pro_det->links() }}
        </div>
        <!-- /.box-footer-->
      </div>
@stop