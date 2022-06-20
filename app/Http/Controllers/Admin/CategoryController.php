<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
// use App\Models\Product;

class CategoryController extends Controller
{
    public function index(){
        $cate = Category::paginate(12);
        return view('Admin.category.index', compact('cate'));
    }

    public function add(){
        return view('Admin.category.add');
    }

    public function create(Request $req){
        $req->validate([
            'name'=> 'required|unique:categories'
        ],[
            'name.required'=>'Tên danh mục không được để trống!',
            'name.unique'=>"Danh mục $req->name đã tồn tại!"
        ]);

        try {
            $cate = Category::create([
                'name'=>$req->name,
                'status'=>$req->status
            ]);
            if ($cate) {
                return redirect()->route('category.index')->with('ss','Thêm mới danh mục thành công!');
            }
        } catch (\Throwable $th) {
            dd('lỗi ngoại lệ');
        }
    }

    public function edit($id){
        $cate = Category::find($id);
        return view('Admin.category.edit',compact('cate'));
    }
    
    public function update(Request $req, $id){
        $req->validate([
            'name'=> 'required|unique:categories,name,'.$id
        ],[
            'name.required'=>'Tên danh mục không được để trống!',
            'name.unique'=>"Danh mục $req->name đã tồn tại!"
        ]);

        try {
            $cate = Category::find($id)->update([
                'name'=>$req->name,
                'status'=>$req->status
            ]);
            if ($cate) {
                return redirect()->route('category.index')->with('ss','Sửa danh mục thành công!');
            }
        } catch (\Throwable $th) {
            dd('lỗi ngoại lệ');
        }
    }

    public function del($id){
        try {
            $cate = Category::find($id)->delete();
            if ($cate) {
                return redirect()->route('category.index')->with('ss','Xóa danh mục thành công!');
            }
        } catch (\Throwable $th) {
            dd('lỗi ngoại lệ');
        }
    }
}
