<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiemController extends Controller
{
  //
  public function viDu()
  {
    echo "hello";
  }

  public function index()
  {


    $diem = [
      [
        'id' => 1,
        'name' => 'diem',
        'class' => '22A'
      ],
      [
        'id' => 2,
        'name' => 'huy',
        'class' => '22A'
      ]
    ];
    $huy = [
      [
        'id' => 1,
        'name' => 'diem',
        'class' => '22A'
      ],
      [
        'id' => 2,
        'name' => 'huy',
        'class' => '22A'
      ]
    ];
    
    return view('test')->with('diem',$diem);
  }
}
