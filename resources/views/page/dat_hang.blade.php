@extends('master')
@section('content')	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Checkout</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Checkout</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}} @endif</div>
				<div class="row">
					<div class="col-sm-6">
						<h4>Billing Address</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_first_name"> Name*</label>
							<input type="text" name="name" placeholder="Enter your name" id="your_first_name" required>
						</div>

                        <div class="form-block">
							<label>Giới tính</label>
                            <input type="radio" name="gender"  id="gender" class="input-radio" value="nam" checked="checked" style="width:10%"><span style="margin-right:10%">Nam</span>

							<input type="radio" name="gender"  id="gender" class="input-radio" value="nu" style="width:10%"><span>Nữ</span>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" id="address" placeholder="Enter your address" value="Street Address" required>
						</div>

		

						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" placeholder="Enter your address email" id="email" required>
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name ="phone" id="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Order notes</label>
							<textarea id="notes" name="notes" placeholder="Note"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Your Order</h5></div>
							<div class="your-order-body" style="padding:0px 10px" >
								<div class="your-order-item">
									<div class="beta-select"><i class="fa fa-shopping-cart"></i>Shopping Cart (@if(Session::has('cart')){{Session('cart')->totalQty}}
									@else Not item @endif
									) <i class="fa fa-chevron-down"></i></div>


									<div class="beta-dropdown cart-body"></div>
                                    @if(Session::has('cart'))
                                    @foreach ($product_cart as $cart)   
                                    <!--  one item	 -->
										<div class="media">
										<a class="pull-left"href="#">
											<img width="35%" src="/source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left"></a>
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												<span class="color-gray your-order-info">Price: {{$cart['item']['price']}} VND</span>
												
												<span class="color-gray your-order-info">Quantity: {{$cart['item']['qty']}} </span>
											</div>
										</div>
									<!-- end one item -->
                                    @endforeach
                                    @endif
									</div>
									<div class="clearfix"></div>
								</div>
                                <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Quantity Total:</p></div>
                                <div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{$totalQty}} @else 0 @endif</h5></div>
                                <div class="clearfix"></div>
                            </div>  
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Total:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif VND </h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Payment Method</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" name="payment">
										<label for="payment_method_bacs">Direct Bank Transfer </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio"  value="cheque" data-order_button_text="">
										<label for="payment_method_cheque">Cheque Payment </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
										</div>						
									</li>
									
									<li class="payment_method_paypal">
										<input id="payment_method_paypal" type="radio" class="input-radio" name="payment" value="paypal" data-order_button_text="Proceed to PayPal">
										<label for="payment_method_paypal">PayPal</label>
										<div class="payment_box payment_method_paypal" style="display: none;">
											Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account
										</div>						
									</li>
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="">Checkout <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

