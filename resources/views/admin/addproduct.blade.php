@extends('admin.layouts.home')
@section('title', 'Add Products')
@section('content')

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Add Product</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Products</li>
                </ol>
              </nav>
            </div>
            <div class="col-3">
              <div class="text-center mb-n5">  
                <img src="{{ asset('backend/dist/images/breadcrumb/ChatBc.png')}}" alt="" class="img-fluid mb-n4">
              </div>
            </div>
          </div>
        </div>
      </div>
      <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body p-4">
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Product Name</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                      <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                      <path d="M17 17h-11v-14h-2"></path>
                      <path d="M6 5l14 1l-1 7h-13"></path>
                   </svg>
                  </span>
                  <input type="text" class="form-control border-0 ps-2" name="product_name" placeholder="Enter Product Name">
                </div>
                @error('product_name') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Product Price</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    ₦
                  </span>
                  <input type="number" class="form-control border-0 ps-2" name="price" placeholder="Enter Product Price.">
                </div>
                @error('price') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Product Quantity</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-numbers" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M8 10v-7l-2 2"></path>
                      <path d="M6 16a2 2 0 1 1 4 0c0 .591 -.601 1.46 -1 2l-3 3h4"></path>
                      <path d="M15 14a2 2 0 1 0 2 -2a2 2 0 1 0 -2 -2"></path>
                      <path d="M6.5 10h3"></path>
                   </svg>
                  </span>
                  <input type="number" class="form-control border-0 ps-2" name="quantity" placeholder="Enter Product Quantity">
                </div>
                @error('quantity') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Product Short Description</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                      <path d="M9 17h6"></path>
                      <path d="M9 13h6"></path>
                   </svg>
                  </span>
                  <input type="text" class="form-control border-0 ps-2" name="product_short_desc" placeholder="Enter Short Description">
                </div>
                @error('product_short_desc') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Select Category</label>
              <div class="col-sm-9">
                    <select class="form-select mr-sm-2 col-md-4" id="product_category_id" name="product_category_id">
                        <option selected>-- Choose --</option>
                        @foreach ( $categories as $category)

                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                        @endforeach

                    </select>
                @error('category') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Select Sub Category</label>
              <div class="col-sm-9">
                    <select class="form-select mr-sm-2 col-md-4" id="product_subcategory_id" name="product_subcategory_id">
                        <option selected>-- Choose --</option>
                        @foreach ( $subcategories as $subcategory)

                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>

                        @endforeach

                    </select>
                @error('sub_category') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Product Long Description</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <i class="ti ti-message-2 fs-6"></i>
                  </span>
                  <textarea class="form-control p-7 border-0 ps-2" name="product_long_desc" id="" cols="20" rows="1" placeholder="Enter Product Long Description"></textarea>
                </div>
                @error('product_long_desc') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Upload Product Image</label>
              <div class="col-sm-9">
                  <input class="form-control" type="file" name="product_img" id="product_img">
                @error('product_img') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9">
                <Button class="btn btn-primary">Add Product</Button>
              </div>
            </div>
          </div>
         </form>
        </div>
@endsection