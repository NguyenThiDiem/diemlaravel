<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models;
use Session;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\BillDetail;



class PageController extends Controller
{
    //
    public function getIndex(){
        $slide = Slide::all();
        // print_r($slide);
        // exit;
        $new_product  = Product::where('new', 1)->paginate(4);
        $promotion_product = Product::where('promotion_price', '<>', 0)->paginate(8);
        return view('page.trangchu', compact('slide', 'new_product', 'promotion_product'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type', $type)->get();
        $loai_sp = ProductType::all();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);

        return view('page.loai_sanpham', compact('sp_theoloai', 'loai_sp', 'sp_khac'));
    }  
    public function getChitiet(Request $req)
    {
        $sanpham =Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $sp_banchay = Product::where('promotion_price','=',0)->paginate(3);
        $sp_new = Product::where('new',1)->paginate(4);
        //$sp_new = Product::select('id','name','id_type','description','unit_price','promotion_price','image', 'unit', 'new','created_at')->where('new','>',0)->orderBy('update_at','ASC')->paginate(3);
        return view ('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','sp_banchay','sp_new'));
    }
//---------------------------------------



//--------------------------------------

    public function getLienhe(){
        return view('page.lienhe');
    }
    public function getAbout(){
        return view ('page.about');
    }
    public function getIndexAdmin(){
        $new_products =Product::all();
        return view('Admin.admin')->with(['products'=>$new_products]);
    }
    

    // ADD product
    public function getAdminAdd(){
        return view('Admin.formAdd');
    }
    public function postAdminAdd(Request $request){
        $product = new Product();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName=$file->getClientOriginalName('image');
            $file->move('source/image/product',$fileName);
        }
    }



    public function getAdminEdit($id){
        $product =Product::find($id);
        return view('Admin.formEdit')->with(['product'=>$product]);
    }
    public function postAdminEdit(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName('image');
        $file->move('source/image/product',$fileName);
    
    if($request->file('image')!=null){
        $product->image = $fileName;
     
        $product->description =$request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion;
        $product->new = $request->new;
        $product->id_type = $request->type;
        $product->save();
        return $this->getIndexAdmin();
    }
}
    // ------------------------DELETE______
    
    public function postAdminDelete($id){
        $product = Product::find($id);
        $product->delete();
        return $this->getIndexAdmin();
    }

       

//---------------------giỏ hàng------------


public function getAddToCart(Request $req, $id){				
    $product = Product::find($id);				
    $oldCart = Session('cart')?session()->get('cart'):null;				
    $cart = new Cart ($oldCart);				
    $cart->add($product,$id);				
    $req->session()->put('cart', $cart);				
    return redirect()->back();				
}	
public function getDelItemCart($id){
    $oldCart = session()->has('cart')?session()->get('cart'):null;
    $cart = new Cart($oldCart);
    $cart->removeItem($id);
    
    session()->put('cart',$cart);
    return redirect()->back();
}		
//----------------Thanh toán-----------


public function getCheckout(){
    return view('page.dat_hang');
    
}




public function postCheckout(Request $req){		
	

    $cart = session()->get('cart');			
    dd($cart);						
    $customer = new Customer;						
    $customer->name = $req->full_name;						
    $customer->gender = $req->gender;						
    $customer->email = $req->email;						
    $customer->address = $req->address;						
    $customer->phone_number = $req->phone;						
    $customer->note = $req->notes;						
    $customer->save();						
                    
    $bill = new Bill;						
    $bill->id_customer = $customer->id;						
    $bill->date_order = date('Y-m-d');						
    $bill->total = $cart->totalPrice;						
    $bill->payment = $req->payment;						
    $bill->note = $req->notes;						
    $bill->save();		
                    
    foreach($cart->items as $key=>$value){						
        $bill_detail = new BillDetail;						
        $bill_detail->id_bill = $bill->id;						
        $bill_detail->id_product = $key;//$value['item']['id'];						
        $bill_detail->quantity = $value['qty'];						
        $bill_detail->unit_price = $value['price']/$value['qty'];						
        $bill_detail->save();						
    }						
                            
    session()->forget('cart');						
    return redirect()->back()->with('thongbao','Đặt hàng thành công');						
}						






} 