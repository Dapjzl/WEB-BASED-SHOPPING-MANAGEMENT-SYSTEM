@extends('front.layouts.home')
@section('title', 'Categories')
@section('content')

<center> <h2>{{ $category->category_name }} - {{ $category->subcategory_count }} Sub-Category(s) Found</h2> </center>

<section class="tp-product-category pt-60 pb-15">
    <div class="container">
        <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-4">
        @foreach ( $category->subcategories as $subcategory)

            <div class="col">
               <div class="tp-product-category-item text-center mb-40">
                  <div class="tp-product-category-thumb fix">
                     <a href="{{ route('front.product-page', [$subcategory->id, $subcategory->slug]) }}">
                        {{-- <img src="{{ asset($product->product_img)}}" alt="product-category"> --}}
                     </a>
                  </div>
                  <div class="tp-product-category-content">
                     <h3 class="tp-product-category-title">
                        <a href="{{ route('front.product-page',[$subcategory->id, $subcategory->slug]) }}">{{ $subcategory->subcategory_name }}</a>
                     </h3>
                     <p>{{ $subcategory->product_count }} Product(s)</p>
                  </div>
               </div>
            </div>
            
        @endforeach

         </div>  
    </div>
 </section>

@endsection