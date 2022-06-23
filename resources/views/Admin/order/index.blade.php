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
  </div>
  <div class="box-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ giao hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $value)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$value->user->name}}</td>
                <td>{{$value->user->phone}}</td>
                <td>{{$value->address}}</td>
                <td>{{number_format($value->total_price,0, ',', '.')}} đ</td>
                <td>{{$value->note}}</td>
                <td>
                  <form action="{{route('order.update',$value->id)}}" method="post">
                  @csrf
                  @method('PUT')
                    
                      @if ($value->status == 1) 
                        <select name="status" id="" class="" style="height:33px">
                          <option value="1" selected>
                            Đang chờ xác nhận
                          </option>
                          <option value="2">
                            Đang vận chuyển
                          </option>
                          <option value="3">
                            Đã hoàn thành
                          </option>
                          <option class="huy" style="color:red" value="4">
                            Đơn hàng đã hủy
                          </option>
                        </select>
                      @endif

                      @if ($value->status == 2) 
                        <select name="status" id="" class="" style="height:33px">
                          <option value="2" selected>
                            Đang vận chuyển
                          </option>
                          <option value="3">
                            Đã hoàn thành
                          </option>
                          <option class="huy" style="color:red" value="4">
                            Đơn hàng đã hủy
                          </option>
                        </select>
                      @endif

                      @if($value->status == 3)
                        <p value="3" style="color:#00a65a">
                          Đã hoàn thành
                        </p>
                      @endif

                      @if($value->status == 4)
                        <p class="huy" style="color:red">
                          Đơn hàng đã hủy
                        </p>
                      @endif
                    

                    @if ($value->status <= 2) 
                      <button type="submit" class="btn btn-success">Cập nhật</button>
                    @endif
                  </form>
                </td>
                <td>
                    <a href="{{route('order.show',$value->id)}}" class="btn btn-info">Chi tiết</a>
                </td>
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