<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Database_watch;
use Illuminate\Support\Facades\Redirect;

class WatchController extends Controller
{
    //
    // public function addWatch(Request $request){
    //     $watch = new database_watch;
    //     $watch = $name =$request;
    // }
//     public function dataWatch (Request $request){
//         $data = Database_watch::getData();

//         return view('watchView',compact('data'));


// }

public function save_product(Request $request){
        
    $data = array();
    $data['product_name'] = $request->product_name;
    $data['product_quantity'] = $request->product_quantity;
    $data['product_price'] = $request->product_price;
    $data['product_desc'] = $request->product_desc;
    $data['product_content'] = $request->product_content;
    $data['category_id'] = $request->product_cate;
    $data['brand_id'] = $request->product_brand;
    $data['product_status'] = $request->product_status;
    $data['product_image'] = $request->product_status;
    
    Database_watch::postData($data);
   
    return Redirect('watchView');
}

    public function displayForm(Request $request){
        $data = Database_watch::getData();
        return view('watchView',compact('data'));
    }
}
