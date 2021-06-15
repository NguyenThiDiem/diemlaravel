<?php
namespace App\Providers;
use App\Models\ProductType;
use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers;
use App\Providers\Session;
use Illuminate\Http\Request;
class AppServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     
     * @return void
     */
    public function boot()
    {
        //
        View::composer(['header','page.dat_hang'],function($view){
            $loai_sp = ProductType::all();
            $view->with('loai_sp',$loai_sp);
        });
        View::composer(['header','page.dat_hang'],function($view){
            if(session('cart')){
                $oldCart = session()->get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>session()->get('cart'),
                'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty
            
            ]);
            }
        }
        );
    
}
}   
