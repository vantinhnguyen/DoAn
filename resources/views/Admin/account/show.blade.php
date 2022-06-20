@extends('Admin.master')
@section('title','QUẢN LÝ ĐƠN HÀNG')
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
          <h3>Chi tiết đơn hàng số</h3>
        </div>
        <div class="box-body">
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Mã đơn hàng</th>
                      <th>Giá trị đơn hàng</th>
                      <th>Thời gian đặt hàng</th>
                      <th>Trạng thái đơn hàng</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($order as $value)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$value->id}}</td>
                      <td>{{number_format($value->total_price,0, ',', '.')}} đ</td>
                      <td>{{$value->created_at}}</td>
                      <td>
                        @if($value->status==1)
                          Đang chờ xác nhận
                        @elseif($value->status==2)
                          Đang vận chuyển
                        @elseif($value->status==3)
                          <span style="color:#38ef38">Đã hoàn thành</span>
                        @elseif($value->status==4)
                          <span style="color:red">Đơn hàng đã hủy</span>
                        @endif
                      </td>
                      <td></td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{ $order->links() }}
        </div>
        <!-- /.box-footer-->
      </div>
@stop