<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_detail;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Order;
use App\Models\Order_detail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::paginate(10);
        return view('Admin.order.index',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $order_detail = Order_detail::where('order_id',$id)->paginate(5);
        return view('Admin.order.show',compact('order_detail','id','order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id)->update(['status'=>$request->status]);
        if ($order) {
            return redirect()->route('order.index')->with('ss','Cập nhật trạng thái đơn hàng thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status1()
    {
        $order = Order::where('status',1)->paginate(10);
        return view('Admin.order.index',compact('order'));
    }

    public function status2()
    {
        $order = Order::where('status',2)->paginate(10);
        return view('Admin.order.index',compact('order'));
    }
}
