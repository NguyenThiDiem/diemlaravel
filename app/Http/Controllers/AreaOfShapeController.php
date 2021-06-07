<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaOfShapeController extends Controller
{
    function computerArea (Request $request){
        $soA = $request->input('soA');
        $soH = $request->input('soH');
        $a = $request->input('a');
        $b = $request->input('b');
        $c = $request->input('c');
        $d = $request->input('d');
        return view('triangle')->with(['areaTriangle'=>($soA + $soH)/2,'areaQuadrangle'=>($a + $b +$c +$d)]);
    }
}
