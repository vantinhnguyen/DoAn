<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\login\RegisterRequest;
use App\Http\Requests\login\LoginRequest;
use App\Http\Requests\login\InfoRequest;
use App\Http\Requests\login\PasswordRequest;
use Hash;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_detail;
use App\Models\Size;
use App\Models\Color;

class HomeController extends Controller
{
    public function index(){
        $pro = Product::whereIn('status',[2])->get();
        return view('fe.home', compact('pro'));
    }

    public function veChungToi(){

        return view('fe.layouts.ve-chung-toi');
    }

    public function product(){
        //tất cả danh mục sản phẩm
        $cate = Category::all();

        //tất cả sản phẩm
        $pro = Product::whereIn('status',[1,2])->get();
        return view('fe.layouts.san-pham', compact('pro','cate'));
    }

    public function productFilter($name){

        if ($name == 'mu-bao-hiem-3-4-dau') {
            $name = 'Mũ bảo hiểm 3/4 đầu';

        }else if($name == 'mu-bao-hiem-1-2-dau'){
            $name = 'Mũ bảo hiểm 1/2 đầu';

        }else if($name == 'mu-bao-hiem-fullface'){
            $name = 'Mũ bảo hiểm Fullface';

        }else if($name == 'mu-bao-hiem-lat-cam'){
            $name = 'Mũ bảo hiểm lật cằm';

        }else if($name == 'kinh-mu-bao-hiem'){
            $name = 'Kính mũ bảo hiểm';

        }else if($name == 'mu-bao-hiem-di-xe-dap'){
            $name = 'Mũ bảo hiểm đi xe đạp';
        }
        
        //lấy id của danh mục sản phẩm
        $cate = Category::where('name',$name)->get();
        foreach ($cate as $key => $value) {
            $cate_id = $value->id;
            $cate_name = $value->name;
        }
        // dd($cate_id);

        //tất cả sản phẩm có cate_id
        $pro = Product::where('category_id',$cate_id)->get();
        return view('fe.layouts.san-pham-filter', compact('pro','cate_name'));
    }

    public function product_detail($id){
        //tất cả sản phẩm
        $pro = Product::find($id);
       
        //chi tiết sản phẩm
        $pro_det = Product_detail::get()->where('product_id',$id);
        $pro_dets = [];
        $i=0;
        foreach ($pro_det as $value){
            $pro_dets[$i] = $value;
            $i += 1;
        }
        $pro_det_first = $pro_dets[0];
        return view('fe.layouts.san-pham-detail', compact('pro','pro_det','pro_det_first'));
    }

    public function daiLy(){
        return view('fe.layouts.dai-ly');
    }

    public function chinhSach(){
        return view('fe.layouts.chinh-sach');
    }

    public function blogs(){
        return view('fe.layouts.blogs');
    }

    public function tuyenDung(){
        return view('fe.layouts.tuyen-dung');
    }

    public function lienHe(){
        return view('fe.layouts.lien-he');
    }

    public function login(Request $req){
        if (isset($req['page'])) {
            $page=($req['page']);
            return view('fe.layouts.login',compact('page'));
        }else{
            return view('fe.layouts.login');
        }
    }

    public function logon(){
        return view('fe.layouts.logon');
    }

    public function loginAdd(LoginRequest $req){
        
        $user = User::where('email',$req->email)->get();
        if (isset($user[0]->status)) {
            if ($user[0]->status == 1) {
                if ( Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
                    if (isset($req->page)) {
                        return redirect()->route($req->page);
                    }else{
                        return redirect()->route('home.index')->with('ss','Bạn đã đăng nhập thành công!');
                    }

                }else{
                    return redirect()->route('home.login')->with('er','Mật khẩu chưa đúng!');
                }
            }else{
                return redirect()->route('home.login')->with('er','Tài khoản của bạn đã bị khóa!');
            }
        }else{
            return redirect()->route('home.login')->with('er','Email chưa đúng!');
        }
        
    }

    public function logonAdd(LoginRequest $req){
        $user = User::where('email',$req->email)->get();
        if ($user[0]->status == 1) {
            if ($user[0]->role == 1) {
                if ( Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
                    return redirect()->route('Admin.index')->with('ss','Bạn đã đăng nhập thành công!');
                }else{
                    return redirect()->route('home.logon')->with('er','Sai email hoặc mật khẩu!');
                }
            }else{
                return redirect()->route('home.logon')->with('er','Tài khoản của bạn không có quyền Admin hãy đăng nhập lại!');
            }
        }else{
            return redirect()->route('home.logon')->with('er','Tài khoản của bạn đã bị khóa!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.login')->with('ss','Bạn đã đăng xuất thành công!');
    }

    public function register(){
        return view('fe.layouts.register');
    }

    public function registerAdd(RegisterRequest $req){
        $user = User::create([
            'name'=> $req->name,
            'email'=> $req->email,
            'phone'=> $req->phone,
            'password'=> Hash::make($req->password)
        ]);
        if ( $user) {
            return redirect()->route('home.login')->with('ss','Bạn đã đăng ký thành công!');
        }
    }

    public function info(){
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        return view('fe.layouts.info', compact('user'));
    }

    public function infoUpdate(InfoRequest $req,$id){
        $user = User::find($id)->update([
            'name'=> $req->name,
            'email'=> $req->email,
            'phone'=> $req->phone
        ]);
        if ( $user) {
            return redirect()->route('home.index')->with('ss','Cập nhật thông tin thành công!');
        }
    }

    public function password(){
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        return view('fe.layouts.password', compact('user'));
    }

    public function passwordEdit(PasswordRequest $req){
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        if (Hash::check($req->password_old,$user->password)) {

            $password= Hash::make($req->password);
            $user = User::find($id_user)->update([
                'password'=> $password
            ]);

            if ($user) {
                return redirect()->route('home.index')->with('ss','Đổi mật khẩu thành công!');
            }
        }else{
            $err = 'Mật khẩu hiện tại không đúng!';
            return view('fe.layouts.password', compact('err'));
        }
    }

    public function orderDetailAdd(Request $req){
        
    }
}
