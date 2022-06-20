<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Http\Requests\size\AddSizeRequest;
use App\Http\Requests\size\EditSizeRequest;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Size::paginate(12);
        return view('Admin.size.index',compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size = Size::all();
        return view('Admin.size.add',compact('size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSizeRequest $request)
    {
        try {
            $size = Size::create($request->all());
                if ($size) {
                    return redirect()->route('size.index')->with('ss','Thêm màu mới thành công!');
                }
        } catch (\Throwable $th) {
            //throw $th;
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
        $size = Size::find($id);
        return view('Admin.size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSizeRequest $request, $id)
    {
        try {
            $size = Size::find($id)->update($request->all());
                if ($size) {
                    return redirect()->route('size.index')->with('ss','Cập nhật thành công!');
                }
        } catch (\Throwable $th) {
            //throw $th;
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
        try {
            $size = Size::find($id)->delete();
                if ($size) {
                    return redirect()->route('size.index')->with('ss','Xóa thành công!');
                }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
