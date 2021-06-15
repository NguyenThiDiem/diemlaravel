<?php

namespace App\Http\Controllers;

use App\Models\BillDetail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Jobs\SendEmail;

class MailController extends Controller
{
    //
    public function store(Request $request)
{
   $customer = new Customer();
   $customer->name = $request->name;
   $customer->save();

   $billdetails =BillDetail ::all();
   $message = [
       
       'title' => $customer->name,
       'content' => 'You order successful!',
   ];
   SendEmail::dispatch($message, $billdetails)->delay(now()->addMinute(1));

   return redirect()->back();
}
}
