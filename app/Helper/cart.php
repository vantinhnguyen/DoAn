<?php
namespace App\Helper;

use Session;
class Cart {
    private $items = [];

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    //phương thức thêm mới
    public function add($pro, $pro_det, $quantity){
       
        $item = [ 
            'productDetail_id'=>$pro_det->id,
            'productDetail_name'=>$pro->name,
            'productDetail_image'=>$pro_det->image,
            'color'=>$pro_det->color->name,
            'productDetail_size'=>$pro_det->size->name,
            'productDetail_price'=>$pro_det->sale_price > 0 ? $pro_det->sale_price : $pro_det->price,
            'productDetail_quantity'=>$quantity
        ];

        if (isset($this->items[$pro_det->id])) {
            $this->items[$pro_det->id]['productDetail_quantity'] += $quantity;
        }else{
            $this->items[$pro_det->id] = $item;
        }
        
        return session(['cart'=>$this->items]);
    }

    public function update($id, $quantity){
        $this->items[$id]['productDetail_quantity'] = $quantity;
        return session(['cart'=>$this->items]);
    }

    public function del($id){
        unset($this->items[$id]);
        return session(['cart'=>$this->items]);
    }

    public function totalQty(){
        $totalQty = 0;
        foreach ($this->items as $value){
            $totalQty += $value['productDetail_quantity'];
        }
        return $totalQty;
    }

    public function totalPrice(){
        $totalPrice = 0;
        foreach ($this->items as $value){
            $totalPrice += ($value['productDetail_quantity'] * $value['productDetail_price']);
        }
        return $totalPrice;
    }

    public function content(){
        return $this->items;
    }

    public function destroy(){
        return session()->forget('cart');
    }
}

