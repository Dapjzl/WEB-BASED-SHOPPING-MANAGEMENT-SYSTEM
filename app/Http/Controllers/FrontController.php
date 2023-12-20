<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

use App\Models\Deliveryaddress;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {

        $allproducts = Product::all();

        $subcategory = Category::with('subcategories.products')->take(5)->get();
        
        
        if ($subcategory) {


            return view('front.front', compact('subcategory','allproducts'));
        } else {
            return view('front.front');
        }

    }

    public function dashboard()
    {
        $allproducts = Product::all();
        
        $subcategory = Category::with('subcategories.products')->take(5)->get();

        if ($subcategory) {

            return view('front.front', compact('subcategory','allproducts'));
        } else {
            return view('front.front');
        }

    }


    public function single()
    {
        return view('front.single-profile');
    }

    public function pendingorder()
    {
        $user_id = Auth::id(); 
        $cart_items = Cart::where('user_id', $user_id)->get();
        $pending_orders = Order::where('status', 'pending')->get();

        return view('front.pending-order', compact('$pending_orders', 'cart_items'));
    }

    public function history()
    {
        return view('front.history');
    }

    public function category($id)
    {

        $category = Category::with('subcategories')->findOrFail($id);
        $products = Product::where('product_category_id', $id)->first();


        if ($category) {
            $subcategories = $category->subcategories;
            return view('front.category', compact('category', 'products'));
        } else {
            return view('front.category');
        }
    }

    public function productpage($id)
    {

        $category = Subcategory::with('products')->find($id);
        $products = Product::where('product_subcategory_id', $id)->first();


        if ($category) {
            $products = $category->products;
    
            return view('front.product-page', compact('category', 'products'));
        } else {
            return view('front.product-page', compact('category', 'products'));
        }

    }

    public function singleproduct($id)
    {
        $category = Subcategory::with('products')->find($id);
        $products = Product::where('product_subcategory_id','product_category_id', $id)->first();
        $cat = Category::all();
        $subs = Subcategory::all();


        if ($category) {
            $products = $category->products;
    
            return view('front.single-product', compact('category','subs','cat', 'products'));
        } else {
            return view('front.single-product', compact('category','subs','cat', 'products'));
        }


    }

    public function addtocart()
    {
        $user_id = Auth::id(); 
        $cart_items = Cart::where('user_id', $user_id)->get();
        return view('front.add-to-cart', compact('cart_items'));
    }

    public function storecart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;

        $request->validate([  
            'product_id' => 'required',  
            'quantity' => 'required',


        ]);

       $cart = new Cart();
       $cart -> product_id = $request->input('product_id');
       $cart -> user_id = Auth::id();
       $cart -> quantity = $request->input('quantity');
       $cart -> price = $price;


       $cart->save();
 
        session()->flash('success', 'Item Added To Cart Successfully');
        return redirect()->route('front.addtocart')->with('message');
    }

    public function removecartitem($id){
        Cart::findOrFail($id)->delete();

        session()->flash('success', 'Item has been removed from cart successfully');
        return redirect()->route('front.addtocart')->with('message');
    }

    public function getdelivery(){

        return view('front.deliveryaddress');
    }

    public function storedelivery(Request $request){

        $request->validate([  
            'country' => 'required',  
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'email' => 'required',


        ]);

        $deli = new Deliveryaddress();
        $deli -> user_id = Auth::id();
        $deli -> country = $request->input('country');
        $deli -> address = $request->input('address'); 
        $deli -> type = $request->input('type'); 
        $deli -> city = $request->input('city');
        $deli -> state = $request->input('state');
        $deli -> postcode = $request->input('postcode');
        $deli -> phone = $request->input('phone');
        $deli -> email = $request->input('email');
        $deli -> note = $request->input('note');

        $deli->save();
  
        return redirect()->route('front.checkout');

    }

    public function checkout()
    {
        $user_id = Auth::id(); 
        $cart_items = Cart::where('user_id', $user_id)->get();
        $delivery_info = Deliveryaddress::where('user_id', $user_id)->first();

        return view('front.checkout', compact('cart_items','delivery_info'));
    }

    public function storeorder()
    {
        $user_id = Auth::id(); 
        $delivery_info = Deliveryaddress::where('user_id', $user_id)->first();
        $cart_items = Cart::where('user_id', $user_id)->get();

        foreach($cart_items as $item){
            Order::insert([
                'user_id' => Auth::id(),
                'shipping_phonenumber' => $delivery_info->phone,
                'shipping_city' => $delivery_info->city,
                'shipping_postalcode' => $delivery_info->postcode,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,

            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        Deliveryaddress::where('user_id', $user_id)->first()->delete();

        session()->flash('success', 'Your Order has been placed successfully');
        return redirect()->route('front.pending-order')->with('message');
    }

    public function newrelease()
    {
        return view('front.new-release');
    }

    public function todaysdeal()
    {
        return view('front.todays-deal');
    }

    public function service()
    {
        return view('front.service');
    }

    public function blog(){
        return view('front.blog');
    }
}
