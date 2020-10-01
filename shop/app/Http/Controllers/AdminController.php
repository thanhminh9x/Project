<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\ExcelExports;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Product;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProductType;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\BillDetail;
use Excel;
use App\Imports\ExcelImports;
use Maatwebsite\Excel\Excel as ExcelExcel;

class AdminController extends Controller
{
    public function getAdmin()
    {
        return view('admin.index');
    }

//    public function login(){
//        Auth::login();
//        return redirect()->route('admin');
//    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    //Category

    public function getCategory(){
        $category = ProductType::all();
//        $category = ProductType::where('id',)->first();
        return view('/admin/category/category',compact('category'));
    }
    //sửa dữ liệu
    public function edit($id)
    {
        $category = ProductType::findOrFail($id);
        $pageName = 'Category - Update';
        return view('/admin/category/category_update', compact('category', 'pageName'));
    }
    public function update(Request $request, $id)
    {

        $category = ProductType::find($id);
        $category->image = $request->image;
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->action('AdminController@getCategory');
    }
    //xóa dữ liệu
    public function destroy($id)
    {
        $category = Product::where('id_type','=',$id)->delete();
        $category = ProductType::find($id);
        $category->delete();
        return redirect()->action('AdminController@getCategory')->with('success','Dữ liệu xóa thành công.');
    }
    public function create()
    {
        return view('/admin/category/category_create');
    }
    public function store(Request $request)
    {
        $category = new ProductType();
        $category->image = $request->image;
        if ($request->hasFile('image'))
        $request->file('image')->move( 'images', 'Saved.png');
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->action('AdminController@getCategory');
    }

    //User

    public function getProduct(){
        $product = Product::all();
        return view('/admin/product/product',compact('product'));
    }
    //sửa dữ liệu
    public function productEdit($id)
    {
        $product = Product::findOrFail($id);
        $pageName = 'Product - Update';
        return view('/admin/product/update', compact('product', 'pageName'));
    }
    public function productUpdate(Request $request, $id)
    {
        $product = Product::find($id);
        $product->image = $request->image;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->id_type = $request->id_type;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;

        $product->save();
        return redirect()->action('AdminController@getProduct');
    }
    //xóa dữ liệu
    public function productDestroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->action('AdminController@getProduct')->with('success','Dữ liệu xóa thành công.');
    }
    public function productCreate()
    {
        return view('/admin/product/create');
    }
    public function productStore(Request $request)
    {
        $product = new Product();
        $product->image = $request->image;
        if ($request->hasFile('image'))
            $request->file('image')->move( 'images', 'Saved.png');
        $product->name = $request->name;
        $product->description = $request->description;
        $product->id_type = $request->id_type;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;

        $product->save();
        return redirect()->action('AdminController@getProduct');
    }

    //customer

    public function getCustomer(){
        $customer = Customer::all();
        return view('/admin/customer/customer',compact('customer'));
    }
    //sửa dữ liệu
    public function customerEdit($id)
    {
        $customer = Customer::findOrFail($id);
        $pageName = 'Customer - Update';
        return view('/admin/customer/update', compact('customer', 'pageName'));
    }
    public function customerUpdate(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;

        $customer->save();
        return redirect()->action('AdminController@getCustomer');
    }
    //xóa dữ liệu
    public function customerDestroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->action('AdminController@getCustomer')->with('success','Dữ liệu xóa thành công.');
    }
    public function customerCreate()
    {
        return view('/admin/customer/create');
    }
    public function customerStore(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;

        $customer->save();
        return redirect()->action('AdminController@getCustomer');
    }

    //Bill


    public function getBill(){
        $bill = Bill::all();
        // dd($bill);
        return view('/admin/bill/bill',compact('bill'));
    }
//sửa dữ liệu
    public function billEdit($id)
    {
        $bill = Bill::findOrFail($id);
        $pageName = 'Bill - Update';
        return view('/admin/bill/update', compact('bill', 'pageName'));
    }

    public function billUpdate(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->id_customer = $request->id_customer;
        $bill->date_order = $request->date_order;
        $bill->total = $request->total;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->created_at = $request->created_at;
        $bill->updated_at = $request->updated_at;

        $bill->save();
        return redirect()->action('AdminController@getBill');
    }


//xóa dữ liệu
    public function billDestroy($id)
    {
        $bill =Bill::find($id);
        $bill->delete();
        return redirect()->action('AdminController@getBill')->with('success','Dữ liệu xóa thành công.');
    }
    public function billCreate()
    {
        return view('/admin/bill/create');
    }
    public function billStore(Request $request)
    {
        $bill = new Bill();
        $bill->id_customer = $request->id_customer;
        $bill->date_order = $request->date_order;
        $bill->total = $request->total;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->created_at = $request->created_at;
        $bill->updated_at = $request->updated_at;

        $bill->save();
        return redirect()->action('AdminController@getBill');
    }
    public function export_csv(){
        return Excel::download(new ExcelExports,('bill.xlsx'));
    }


    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImports, $path);
        return back();
    }


    //BillDetail

    public function getBillDetail(){
        $billDetail = BillDetail::all();
        return view('/admin/billDetail/billDetail',compact('billDetail'));
    }
//sửa dữ liệu
    public function billDetailEdit($id)
    {
        $billDetail = BillDetail::findOrFail($id);
        $pageName = 'BillDetail - Update';
        return view('/admin/billDetail/update', compact('billDetail', 'pageName'));
    }
    public function billDetailUpdate(Request $request, $id)
    {
        $billDetail = BillDetail::find($id);
        $billDetail->id_bill = $request->id_bill;
        $billDetail->id_product = $request->id_product;
        $billDetail->quantity = $request->quantity;
        $billDetail->unit_price = $request->unit_price;

        $billDetail->save();
        return redirect()->action('AdminController@getBillDetail');
    }
//xóa dữ liệu
    public function billDetailDestroy($id)
    {
        $billDetail =BillDetail::find($id);
        $billDetail->delete();
        return redirect()->action('AdminController@getBillDetail')->with('success','Dữ liệu xóa thành công.');
    }
    public function billDetailCreate()
    {
        return view('/admin/billDetail/create');
    }
    public function billDetailStore(Request $request)
    {
        $billDetail = new BillDetail();
        $billDetail->id_bill = $request->id_bill;
        $billDetail->id_product = $request->id_product;
        $billDetail->quantity = $request->quantity;
        $billDetail->unit_price = $request->unit_price;

        $billDetail->save();
        return redirect()->action('AdminController@getBillDetail');
    }
}
