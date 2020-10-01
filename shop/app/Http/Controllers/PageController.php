<?php

namespace App\Http\Controllers;

use App\BillDetail;
use App\Product;
use App\Slide;
use App\ProductType;
use Illuminate\Http\Request;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\User;
use Hash;
use Auth;
class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
      /*  $new_product = Product::where('new','1')->get();   đưa lên hết sản phẩm */
        $new_product = Product::where('new','1')->simplepaginate(4); //đưa lên 4 sản phẩm
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChitiet(Request $request){
        $sanpham = Product::where('id',$request->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getLienhe(){
        return view('page.lienhe');
    }
    public function getGioithieu(){
        return view('page.gioithieu');
    }
    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function  getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckout(){
        return view('page.dat_hang');
    }
    public function postCheckout(Request $req){


        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key=> $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
            $bill_detail->save();

        }
        Session::forget('cart');

        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    public function getLogin(){
        return view('page.dangnhap');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:32'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu nhiều nhất 32 kí tự '
            ]);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }
    public function getSignup(){
        return view('page.dangki');
    }
    public function postSignup(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:32',
            'name'=>'required',
            're_password'=>'required|same:password'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu nhiều nhất 32 kí tự',
            're_password.same'=>'Mât khẩu không giống nhau',
            'name.required'=>'Tên không được để trống'
        ]);
        $uses = new User();
        $uses->name = $req->name;
        $uses->email = $req->email;
        $uses->password = Hash::make($req->password);
        $uses->phone = $req->phone;
        $uses->address = $req->address;
        $uses->role = 2;
        $uses->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');

    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
            ->orWhere('unit_price',$req->key)
            ->get();
        return view('page.search',compact('product'));
    }
}
