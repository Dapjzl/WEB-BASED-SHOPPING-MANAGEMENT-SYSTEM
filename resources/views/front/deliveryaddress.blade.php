@extends('front.layouts.home')
@section('title', 'Delivery Address')
@section('content')

    <div class="container">
        <div class="row">

            {{--<div class="col-xl-7 col-lg-7">
                    <div class="tp-checkout-verify">
                   <div class="tp-checkout-verify-item">
                      <p class="tp-checkout-verify-reveal">Returning customer? <button type="button" class="tp-checkout-login-form-reveal-btn">Click here to login</button></p>

                      <div id="tpReturnCustomerLoginForm" class="tp-return-customer">
                         <form action="#">
                            
                            <div class="tp-return-customer-input">
                               <label>Email</label>
                               <input type="text" placeholder="Your Email">
                            </div>
                            <div class="tp-return-customer-input">
                               <label>Password</label>
                               <input type="password" placeholder="Password">
                            </div>

                            <div class="tp-return-customer-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                               <div class="tp-return-customer-remeber">
                                  <input id="remeber" type="checkbox">
                                  <label for="remeber">Remember me</label>
                               </div>
                               <div class="tp-return-customer-forgot">
                                  <a href="forgot.html">Forgot Password?</a>
                               </div>
                            </div>
                            <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Login</button>
                         </form>
                      </div>
                   </div>
                   <div class="tp-checkout-verify-item">
                      <p class="tp-checkout-verify-reveal">Have a coupon? <button type="button" class="tp-checkout-coupon-form-reveal-btn">Click here to enter your code</button></p>

                      <div id="tpCheckoutCouponForm" class="tp-return-customer">
                         <form action="#">
                            <div class="tp-return-customer-input">
                               <label>Coupon Code :</label>
                               <input type="text" placeholder="Coupon">
                            </div>
                            <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Apply</button>
                         </form>
                      </div>
                   </div>
                </div>
             </div> --}}
             <div class="col-lg-12">
                <div class="tp-checkout-bill-area">
                   <h3 class="tp-checkout-bill-title">Billing Details</h3>

                   <div class="tp-checkout-bill-form">
                      <form action="{{ route('storedelivery') }}" method="POST">
                        @csrf
                         <div class="tp-checkout-bill-inner">
                            <div class="row">
                               {{-- <div class="col-md-6">
                                  <div class="tp-checkout-input">
                                     <label>First Name <span>*</span></label>
                                     <input type="text" placeholder="First Name">
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="tp-checkout-input">
                                     <label>Last Name <span>*</span></label>
                                     <input type="text" placeholder="Last Name">
                                  </div>
                               </div> --}}
                               {{-- <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Company name (optional)</label>
                                     <input type="text" placeholder="Example LTD.">
                                  </div>
                               </div> --}}
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Country / Region </label>
                                     <input type="text" placeholder="United States (US)" name="country">
                                  </div>
                                  @error('country') <p class=" text-danger">{{ $message }}</p> @enderror
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Street address</label>
                                     <input type="text" placeholder="House number and street name" name="address">
                                  </div>
                                  @error('address') <p class=" text-danger">{{ $message }}</p> @enderror

                                  <div class="tp-checkout-input">
                                     <input type="text" placeholder="Apartment, suite, unit, etc. (optional)" name="type">
                                  </div>
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Town / City</label>
                                     <input type="text" placeholder="" name="city">
                                  </div>
                                  @error('city') <p class=" text-danger">{{ $message }}</p> @enderror
                               </div>
                               <div class="col-md-6">
                                <div class="tp-checkout-input">
                                   <label>State / County</label>
                                   <input type="text" placeholder="" name="state">
                                </div>
                                @error('state') <p class=" text-danger">{{ $message }}</p> @enderror
                             </div>
                               <div class="col-md-6">
                                  <div class="tp-checkout-input">
                                     <label>Postcode ZIP</label>
                                     <input type="text" placeholder="" name="postcode">
                                  </div>
                                  @error('postcode') <p class=" text-danger">{{ $message }}</p> @enderror
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Phone <span>*</span></label>
                                     <input type="text" placeholder="" name="phone">
                                  </div>
                                  @error('phone') <p class=" text-danger">{{ $message }}</p> @enderror
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Email address <span>*</span></label>
                                     <input type="email" placeholder="" name="email">
                                  </div>
                                  @error('email') <p class=" text-danger">{{ $message }}</p> @enderror
                               </div>
                               {{-- <div class="col-md-12">
                                  <div class="tp-checkout-option-wrapper">
                                     <div class="tp-checkout-option">
                                        <input id="create_free_account" type="checkbox">
                                        <label for="create_free_account">Create an account?</label>
                                     </div>
                                     <div class="tp-checkout-option">
                                        <input id="ship_to_diff_address" type="checkbox">
                                        <label for="ship_to_diff_address">Ship to a different address?</label>
                                     </div>
                                  </div>
                               </div> --}}
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Order notes (optional)</label>
                                     <textarea placeholder="Notes about your order, e.g. special notes for delivery." name="note"></textarea>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <input type="submit" value="Next" class="btn btn-primary">
                      </form>
                   </div>
                </div>
             </div>
        </div>
    </div>
@endsection