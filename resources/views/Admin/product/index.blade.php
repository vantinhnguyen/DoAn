@extends('Admin.master')
@section('title','QUẢN LÝ SẢN PHẨM')
@section('content')
<div class="box">
<div class="box-header with-border">
          @if(Session::has('ss'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{Session::get('ss')}}</strong>
          </div>
          @endif
          <a href="{{route('product.create')}}" class="btn btn-info">Thêm mới sản phẩm</a>
        </div>
        <div class="box-body">
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Ảnh đại diện</th>
                      <th>Mô tả sản phẩm</th>
                      <th>Danh mục sản phẩm</th>
                      <th>Trạng thái</th>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($pro as $value)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$value->name}}</td>
                      <td><img src="{{url('upload')}}/{{$value->image}}" alt="" style="width:100px"></td>
                      <td>{!!$value->description!!}</td>
                      <td>{{$value->category->name}}</td>
                      <td>
                        @if ($value->status==2)
                          Nổi bật
                        @endif

                        @if ($value->status==1)
                          Hiện
                        @endif

                        @if ($value->status==0)
                          Ẩn
                        @endif
                      </td>
                      <td>
                          <form action="{{route('product.destroy',$value->id)}}" method="post" class="d-flex justify-content-center align-items-center">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('product.edit',$value->id)}}" class="btn btn-info">Sửa</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                          </form>
                      </td>
                      <td>
                      <a href="{{route('product_detail.show',$value->id)}}" class="btn btn-info">Biến thể sản phẩm</a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{ $pro->links() }}
        </div>
        <!-- /.box-footer-->
      </div>
@stop