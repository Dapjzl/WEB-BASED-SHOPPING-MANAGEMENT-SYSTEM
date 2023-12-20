@extends('front.layouts.home')
@section('title', 'Checkout')
@section('content')

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">Checkout</h3>
                   <div class="breadcrumb__list">
                      <span><a href="/">Home</a></span>
                      <span>Checkout</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- checkout area start -->
    <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
       <div class="container">
          <div class="row">
             <div class="col-lg-12">
                <!-- checkout place order -->
                <div class="tp-checkout-place white-bg">
                   <h3 class="tp-checkout-place-title">Your Order</h3>

                   <div class="tp-order-info-list">
                      <ul>

                         <!-- header -->
                         <li class="tp-order-info-list-header">
                            <h4>Product</h4>
                            <h4>Total</h4>
                         </li>

                         <!-- item list -->
                         @foreach ($cart_items as $cart)
                         @php
                            $subtotal = 0;
                             $product_name = App\Models\Product::where('id',$cart->product_id)->value('product_name');
                         @endphp
                         <li class="tp-order-info-list-desc">
                            <p>{{ $product_name }}. <span> x {{ $cart->quantity }}</span></p>
                            <span>$ {{ $cart->price }}</span>
                         </li>
                         @php
                            $subtotal = $subtotal + $cart->price;
                         @endphp

                        @endforeach

                        {{--                          
                         <li class="tp-order-info-list-desc">
                            <p>Office Chair Multifun <span> x 1</span></p>
                            <span>$74:00</span>
                         </li>
                         <li class="tp-order-info-list-desc">
                            <p>Apple Watch Series 6 Stainless  <span> x 3</span></p>
                            <span>$362:00</span>
                         </li>
                         <li class="tp-order-info-list-desc">
                            <p>Body Works Mens Collection <span> x 1</span></p>
                            <span>$145:00</span>
                         </li> 
                         --}}

                         <!-- subtotal -->
                         <li class="tp-order-info-list-subtotal">
                            <span>Subtotal</span>
                            <span>{{ $subtotal }}</span>
                         </li>

                         <!-- shipping -->
                         <li class="">
                            <span>Shipping Details</span>
                            <div class="">
                                
                                   <B> Phone - <p>{{ $delivery_info->phone }}</p>
                                        Address - <p>{{ $delivery_info->address }}</p>
                                        State - <p>{{ $delivery_info->state }}</p>
                                        Email - <p>{{ $delivery_info->email }}</p>
                                   </B>
                               
                               <span>
                                  <input id="flat_rate" type="radio" name="shipping">
                                  <label for="flat_rate">Delivery rate: <span>$20.00</span></label>
                               </span>
                            </div>
                         </li>

                         <!-- total -->
                         <li class="tp-order-info-list-total">
                            <span>Total</span>
                            <span>$1,476.00</span>
                         </li>
                      </ul>
                   </div>
                   <div class="tp-checkout-payment">
                      <div class="tp-checkout-payment-item">
                         <input type="radio" id="back_transfer" name="payment">
                         <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Direct Bank Transfer</label>
                         <div class="tp-checkout-payment-desc direct-bank-transfer">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                         </div>
                      </div>
                      <div class="tp-checkout-payment-item">
                         <input type="radio" id="cheque_payment" name="payment">
                         <label for="cheque_payment">Cheque Payment</label>
                         <div class="tp-checkout-payment-desc cheque-payment">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                         </div>
                      </div>
                      <div class="tp-checkout-payment-item">
                         <input type="radio" id="cod" name="payment">
                         <label for="cod">Cash on Delivery</label>
                         <div class="tp-checkout-payment-desc cash-on-delivery">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                         </div>
                      </div>
                      <div class="tp-checkout-payment-item paypal-payment">
                         <input type="radio" id="paypal" name="payment">
                         <label for="paypal">PayPal <img src="assets/img/icon/payment-option.png" alt=""> <a href="#">What is PayPal?</a></label>
                      </div>
                   </div>
                   <div class="tp-checkout-agree">
                      <div class="tp-checkout-option">
                         <input id="read_all" type="checkbox">
                         <label for="read_all">I have read and agree to the website.</label>
                      </div>
                   </div>
                   <form action="{{ route('storeorder') }}" method="post">
                    @csrf
                        <div class="tp-checkout-btn-wrapper">
                            <button class="tp-checkout-btn w-100">Place Order</button>
                        </div>
                   </form>
                   
                   <br><center>-- OR --</center><br>

                   <form action="" method="post">
                    @csrf
                    <div class="tp-checkout-btn-wrapper">
                        <a href="#" class="tp-checkout-btn-warning w-100">Cancel Order</a>
                    </div>
                   </form>
                   
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- checkout area end -->


 </main>

@endsection