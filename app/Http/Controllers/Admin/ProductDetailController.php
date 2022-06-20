<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_detail;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Http\Requests\product_detail\EditProductDetailRequest;
use App\Http\Requests\product_detail\AddProductDetailRequest;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro = Product::all();
        $color = Color::all();
        $size = Size::all();
        return view('Admin.product_detail.add', compact('pro','color','size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductDetailRequest $request)
    {
        try {
            if ($request->hasFile('file')) {
    
                //up load file ảnh
                $time = time();
                $file = $request->file('file');
                $file_name = "$time" . "_" . $file->getClientOriginalName();
                $file->move(public_path('upload'),$file_name);
                
                //tạo bản ghi trong database
                $request->merge(['image'=>$file_name]);
                $pro = Product_detail::create($request->all());
                if ($pro) {
                    return redirect()->route('product_detail.show')->with('ss','Thêm mới biết thể sản phẩm thành công!');
                }
            }
        } catch (\Throwable $th) {
            dd('lỗi ngoại lệ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro_det = Product_detail::where('product_id',$id)->paginate(5);
        // dd($pro_det);
        return view('Admin.product_detail.index',compact('pro_det'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro_det = Product_detail::find($id);
        $pro = Product::all();
        $color = Color::all();
        $size = Size::all();
        return view('Admin.product_detail.edit', compact('pro_det','pro','color','size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductDetailRequest $request, $id)
    {
        $pro_det_old = Product_detail::find($id);
        $pro_id = $pro_det_old->product_id;
        // try {
            if ($request->hasFile('file')) {
    
                //up load ảnh mới vào file upload
                $time = time();
                $file = $request->file('file');
                $file_name = "$time" . "_" . $file->getClientOriginalName();
                $file->move(public_path('upload'),$file_name);

                //cập nhật bản ghi vào trong database
                $request->merge(['image'=>$file_name]);
                $pro_det = Product_detail::find($id)->update($request->all());
                
                //xóa ảnh cũ trong file upload
                unlink('upload/'.$pro_det_old->image);
                if ($pro_det) {
                    return redirect()->route('product_detail.show',$pro_id)->with('ss','Cập nhật biến thể sản phẩm thành công!');
                }
            }else{
                //cập nhật bản ghi vào trong database
                $request->merge(['image'=>$pro_det_old->image]);
                $pro_det = Product_detail::find($id)->update($request->all());
                // dd($request);

                if ($pro_det) {
                    return redirect()->route('product_detail.show',$pro_id)->with('ss','Cập nhật biến thể sản phẩm thành công!');
                }
            }
        // } catch (\Throwable $th) {
        //     dd('lỗi ngoại lệ');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro_det = Product_detail::find($id);
        unlink('upload/'.$pro_det->image);
        $pro_det = $pro_det->delete();
        if ($pro_det) {
            return redirect()->route('product_detail.show')->with('ss','Xóa biến thể sản phẩm thành công!');
        }
    }
}
