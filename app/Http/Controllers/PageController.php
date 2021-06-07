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
}        
