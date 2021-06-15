<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;

class PageController extends Controller
{
    //
    public function getIndex(){
        $slide = Slide::all();
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
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        $sp_banchay = Product::where('promotion_price','=',0)->paginate(3);
        $sp_new = Product::select('id','name','id_type','description','unit_price','promotion_price','image', 'unit', 'new','created_at','updated_at')->where('new','>',0)->orderBy('update_at','ASC')->paginate(3);
        return view ('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','sp_banchay','sp_new'));
    }

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

}        
