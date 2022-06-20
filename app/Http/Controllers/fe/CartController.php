<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use App\Models\Product_detail;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use App\Http\Requests\checkout\CheckoutRequest;
use App\Helper\cart;
use App\Mail\OrderShipped;
use Auth;
use Mail;

class CartController extends Controller
{
    public function Add(Request $req){
        $pro_det = Product_detail::find($req->pro_det_id);
        $pro = Product::find($pro_det->product_id);
        $quantity = $req->quantity;
        $cart = new Cart();
        $cart->add($pro, $pro_det , $quantity);
        $totalQty = $cart->totalQty();
        $totalPrice = $cart->totalPrice();
        // $cart->content()
        return response()->json(['cart'=>$cart->content(),'totalQty'=>$totalQty,'totalPrice'=>$totalPrice],200);
    }

    public function Show(){
        $cart = new Cart();
        $totalQty = $cart->totalQty();
        $totalPrice = $cart->totalPrice();
        $cart = $cart->content();
        return view('fe.layouts.cart', compact('cart', 'totalQty', 'totalPrice'));
    }

    public function Update(Request $req){
        $cart = new Cart();
        $cart->update($req->id, $req->quantity);
        $totalQty = $cart->totalQty();
        $totalPrice = $cart->totalPrice();
        return response()->json(['cart'=>$cart->content(),'totalQty'=>$totalQty,'totalPrice'=>$totalPrice],200);
    }

    public function Del(Request $req){
        $cart = new Cart();
        $cart->del($req->id);
        return redirect()->route('cart.Show')->with('ss','Xóa sản phẩm thành công');
    }

    public function Checkout(Request $req){
        $cart = new Cart();
        $totalPrice = $cart->totalPrice();
        $cart = $cart->content();
        if ($cart) {
            return view('fe.layouts.cartCheckout', compact('cart', 'totalPrice'));
        }else{
            return redirect()->route('cart.Show')->with('er','Giỏ hàng trống!');
        }
    }

    public function CheckoutAdd(CheckoutRequest $req){
        $user = Auth::user();
        $user_id = Auth::id();
        $cart = new Cart;
        $totalPrice = $cart->totalPrice();
        $carts = $cart->content();

        //thêm vào bảng orders
        Order::create([
            'user_id'=>$user_id,
            'note'=>$req->note,
            'address'=>$req->address,
            'total_price'=>$totalPrice
        ]);
        
        //lấy ra bản ghi cuối cùng trong bảng order
        $last_record_order = Order::orderBy('id', 'DESC')->first()->toArray();

        //thêm vào bảng order_details
        foreach ($carts as $value){
            Order_detail::create([
                'order_id'=>$last_record_order['id'],
                'product_detail_id'=>$value['productDetail_id'],
                'quantity'=>$value['productDetail_quantity'],
                'price'=>$value['productDetail_price']
            ]);
        }

        // gửi mail xác nhận đến khách hàng
        $imail = Auth::user()->email;
        Mail::to($user->email)->send(new OrderShipped);

        //xóa sesstion
        $cart->destroy();
        return redirect()->route('home.index')->with('ss','Đặt hàng thành công');
    }

    public function ordered(){
        $id = Auth::user()->id;
        $orders = Order::where('user_id',$id)->get();
        // dd($orders);
        return view('fe.layouts.ordered',compact('orders'));
    }

    public function orderedDel(request $req){
        $order = Order::find($req->id_order)->update([
            'status'=> 4
        ]);
        $orders = Order::where('user_id',$req->id_user)->get();
        return view('fe.layouts.ordered',compact('orders'));
    }

}
