<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumController extends Controller
{
    public function cong ($a, $b){
        return $a + $b;
    }
    public function tinhTong(Request $request){
        $sum = $request->soA + $request->soB;
        echo $sum;
        return view('sum', compact('sum'));
    }
}
