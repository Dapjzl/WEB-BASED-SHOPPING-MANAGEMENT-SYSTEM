<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('admin.dashboard');
    }
   

    public function category()
    {
        $categories = Category::all();
        return view('admin.allcategory', compact('categories'));
    } 

    public function addcategory(){

        return view('admin.addcategory');
    }

    public function editcategory($id){
        $category_info = Category::findOrFail($id);

        return view('admin.editcategory', compact('category_info'));
    }

    public function subcategory(){
        $subcategories = Subcategory::all();
        return view('admin.allsubcategory', compact('subcategories'));
    } 

    public function addsubcategory(){

        $categories = Category::all();
        return view('admin.addsubcategory', compact('categories'));
    }

    public function editsubcategory($id){

        $subcategory_info = Subcategory::findOrFail($id);
        return view('admin.editsubcategory', compact('subcategory_info'));
    }

    public function product(){
        $products = Product::all();
      

        return view('admin.allproduct', compact('products'));
    }

    public function addproduct(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.addproduct', compact('subcategories', 'categories'));
    }
    public function editproduct($id){

        $product_info = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.editproduct', compact('product_info', 'categories', 'subcategories'));
    }

    public function pendingorder(){
        $pending_orders = Order::where('status', 'pending')->get();
        
        return view('admin.pendingorder', compact('pending_orders'));
    }


}
