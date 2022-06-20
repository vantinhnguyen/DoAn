<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\product\EditProductRequest;
use App\Http\Requests\product\AddProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::paginate(5);
        return view('Admin.product.index',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $cate = Category::all();
        return view('Admin.product.add',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
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
                $pro = Product::create($request->all());
                if ($pro) {
                    return redirect()->route('product.index')->with('ss','Thêm mới sản phẩm thành công!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category::all();
        $pro = Product::find($id);
        return view('Admin.product.edit',compact('pro','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $pro_old = Product::find($id);
        try {
            if ($request->hasFile('file')) {
    
                //up load ảnh mới vào file upload
                $time = time();
                $file = $request->file('file');
                $file_name = "$time" . "_" . $file->getClientOriginalName();
                $file->move(public_path('upload'),$file_name);

                //cập nhật bản ghi vào trong database
                $request->merge(['image'=>$file_name]);
                $pro = Product::find($id)->update($request->all());
                
                //xóa ảnh cũ trong file upload
                unlink('upload/'.$pro_old->image);
                if ($pro) {
                    return redirect()->route('product.index')->with('ss','Sửa sản sản phẩm thành công!');
                }
            }else{
                //cập nhật bản ghi vào trong database
                $request->merge(['image'=>$pro_old->image]);
                $pro = Product::find($id)->update($request->all());
                if ($pro) {
                    return redirect()->route('product.index')->with('ss','Cập nhật thông tin sản phẩm thành công!');
                }
            }
        } catch (\Throwable $th) {
            dd('lỗi ngoại lệ');
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
        $pro = Product::find($id);
        unlink('upload/'.$pro->image);
        $pro = $pro->delete();
        if ($pro) {
            return redirect()->route('product.index');
        }
    }
}
