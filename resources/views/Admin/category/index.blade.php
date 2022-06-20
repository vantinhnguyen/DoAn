@extends('Admin.master')
@section('title','QUẢN LÝ DANH MỤC SẢN PHẨM')
@section('content')
<div class="box">
<div class="box-header with-border">
          @if(Session::has('ss'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{Session::get('ss')}}</strong>
          </div>
          @endif
          <a href="{{route('category.add')}}" class="btn btn-info">Thêm mới danh mục</a>
        </div>
        <div class="box-body">
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Tên danh mục</th>
                      <th>Trạng thái</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($cate as $value)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->status==1 ? 'Hiện' : 'Ẩn'}}</td>
                      <td>
                          <a href="{{route('category.edit',$value->id)}}" class="btn btn-info">Sửa</a>
                          <a href="{{route('category.del',$value->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')" class="btn btn-danger">Xóa</a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{ $cate->links() }}
        </div>
        <!-- /.box-footer-->
      </div>
@stop