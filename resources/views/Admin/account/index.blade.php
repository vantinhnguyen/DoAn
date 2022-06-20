@extends('Admin.master')
@section('title','QUẢN LÝ TÀI KHOẢN')
@section('content')
<div class="box">
<div class="box-header with-border">
          @if(Session::has('ss'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{Session::get('ss')}}</strong>
          </div>
          @endif
          <!-- <a href="{{route('product_detail.create')}}" class="btn btn-info">Thêm biến thể sản phẩm mới</a> -->
        </div>
        <div class="box-body">
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Tên người dùng</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Trạng thái tài khoản</th>
                      <th>Quyền</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($accounts as $value)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->phone}}</td>

                      <td>
                        <form action="{{route('account.update',$value->id)}}" method="post">
                        @csrf
                        @method('PUT')
                          <select name="status" id="" class="" style="height:33px">
                              <option value="1" {{$value->status == 1 ? 'selected' : ''}}>
                                Đang hoạt động
                              </option>
                              <option value="0" {{$value->status == 0 ? 'selected' : ''}}>
                                Đang bị khóa
                              </option>
                          </select>
                          <input type="hidden" name="check" value="status">
                          <button type="submit" class="btn btn-success">Cập nhật</button>
                        </form>
                      </td>

                      <td>
                        <form action="{{route('account.update',$value->id)}}" method="post">
                        @csrf
                        @method('PUT')
                          <select name="role" id="" class="" style="height:33px">
                              <option value="1" {{$value->role == 1 ? 'selected' : ''}}>
                                Admin
                              </option>
                              <option value="0" {{$value->role == 0 ? 'selected' : ''}}>
                                Người dùng
                              </option>
                          </select>
                          <input type="hidden" name="check" value="role">
                          <button type="submit" class="btn btn-success">Cập nhật</button>
                        </form>
                      </td>
                      
                      <td>
                        <a href="{{route('account.show',$value->id)}}" class="btn btn-info">Lịch sử mua hàng</a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{ $accounts->links() }}
        </div>
        <!-- /.box-footer-->
      </div>
@stop