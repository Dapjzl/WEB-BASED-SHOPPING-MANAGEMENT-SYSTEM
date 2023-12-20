<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProcessController extends Controller
{
  
   
    //For Category
    public function storecategory(Request $request)
    {

        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

       $cat = new Category();
       $cat -> category_name =$request->input('category_name');
       $cat -> slug = strtolower(str_replace(' ','-', $request->category_name));

       $cat->save();
 
        session()->flash('success', 'New Category has been created successfully');
        return redirect()->route('admin.allcategory')->with('message');

    } 
    public function updatecategory(Request $request){
        $category_id = $request->category_id;

        $request->validate([
           
            'category_name' => 'required|unique:categories,category_name,' . $category_id

        ]); 

        $category = Category::findOrFail($category_id)->update([
            'category_name' => $request->input('category_name'),
            'slug' => strtolower(str_replace(' ', '-', $request->input('category_name')))
        ]);
        

        session()->flash('success', ' Category has been Updated successfully');
        return redirect()->route('admin.allcategory')->with('message');
    }

    public function deletecategory($id){
        Category::findOrFail($id)->delete();

        session()->flash('success', 'Category has been Deleted successfully');
        return redirect()->route('admin.allcategory')->with('message');
    }

   
    //For Sub Category
    public function storesubcategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);

        $category_id = $request->category_id;

        $category_name = Category::where('id', $category_id)->value('category_name');

       $subcat = new Subcategory();
       $subcat -> subcategory_name =$request->input('subcategory_name');
       $subcat -> slug = strtolower(str_replace(' ','-', $request->subcategory_name));
       $subcat -> category_id = $category_id;
       $subcat -> category_name = $category_name;

       Category::where('id',$category_id)->increment('subcategory_count',1);
        

       $subcat->save();
 
        session()->flash('success', 'New Sub-Category has been created successfully');
        return redirect()->route('admin.allsubcategory')->with('message');
    }

    public function updatesubcategory(Request $request){
        $subcategory_id = $request->subcategory_id;

        $request->validate([
           
            'subcategory_name' => 'required|unique:subcategories,subcategory_name,' . $subcategory_id

        ]); 

        
        $subcategory = Subcategory::findOrFail($subcategory_id)->update([
            'subcategory_name' => $request->input('subcategory_name'),
            'slug' => strtolower(str_replace(' ', '-', $request->input('subcategory_name')))
        ]);
        

        session()->flash('success', ' Sub-Category has been Updated successfully');
        return redirect()->route('admin.allsubcategory')->with('message');
    }

    public function deletesubcategory($id){
        $cat_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::findOrFail($id)->delete();

        Category::where('id', $cat_id)->decrement('subcategory_count',1);

        session()->flash('success', 'Sub-Category has been Deleted successfully');
        return redirect()->route('admin.allsubcategory')->with('message');
    }
    
    //For Products

    public function storeproduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_short_desc' => 'required',
            'product_long_desc' => 'required',
            'price' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'quantity' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            
            
        ]);

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;


        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');


       $prod = new Product();
       $prod -> product_name =$request->input('product_name');
       $prod -> product_short_desc =$request->input('product_short_desc');
       $prod -> product_long_desc =$request->input('product_long_desc');
       $prod -> price =$request->input('price');
       $prod -> product_category_name = $category_name;
       $prod -> product_subcategory_name = $subcategory_name; 
       $prod -> quantity =$request->input('quantity');
       $prod -> product_category_id =$request->input('product_category_id');
       $prod -> product_subcategory_id =$request->input('product_subcategory_id');
       $prod -> product_img =$request->input('product_img');
       $prod -> slug = strtolower(str_replace(' ','-', $request->product_name));
      
       

       Category::where('id',$category_id)->increment('product_count',1);
       Subcategory::where('id',$subcategory_id)->increment('product_count',1);

        

       if($request->hasFile('product_img'))
       {
           $file = $request->file('product_img');
           $extension = $file->getClientOriginalExtension();
           $filename = time(). '.'.$extension;
           $file->move('upload/', $filename);//move file to uploads/listings directory
           $prod->product_img = 'upload/'.$filename;
       }
       $prod->save();
 
        session()->flash('success', 'New Product has been created successfully');
        return redirect()->route('admin.allproduct')->with('message');
    }

    public function updateproduct(Request $request){
        $product_id = $request->product_id;
    


        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_name' => 'required|unique:products,product_name,' . $product_id . ',id' , 
            'product_short_desc' => 'required',
            'product_long_desc' => 'required',
            'price' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'quantity' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            
            
        ]);

        $product_info = Product::findOrFail($product_id);
        
        $previous_img = public_path($product_info->product_img);
      
        

        if (File::exists(($previous_img))) {
            File::delete(($previous_img)); //Delete the previous image
        }

        $image = $request->file('product_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload'), $imageName); // Save the image to the desired location



        $product_info->update([   
            'product_name' => $request->input('product_name'),
            'product_short_desc' => $request->input('product_short_desc'),
            'product_long_desc' => $request->input('product_long_desc'),
            'price' => $request->input('price'),
            'product_category_id' => $request->input('product_category_id'),
            'product_subcategory_id' => $request->input('product_subcategory_id'),
            'quantity' => $request->input('quantity'),
            'product_img' => 'upload/'. $imageName,
            'slug' => strtolower(str_replace(' ', '-', $request->input('product_name')))
        ]);
        
        
        session()->flash('success', ' Product has been Updated successfully');
        return redirect()->route('admin.allproduct')->with('message');
    }


    public function deleteproduct($id){
        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');

        Product::findOrFail($id)->delete();

        Category::where('id', $cat_id)->decrement('product_count',1);
        Subcategory::where('id', $subcat_id)->decrement('product_count',1);


        session()->flash('success', 'Product has been Deleted successfully');
        return redirect()->route('admin.allproduct')->with('message');
    }

}
