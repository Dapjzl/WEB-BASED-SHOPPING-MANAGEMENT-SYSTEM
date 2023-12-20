@extends('admin.layouts.home')
@section('title', 'All Products')
@section('content')

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">View Products</h4>
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
         
    <div class="row">
        <div class="card">
    
            <div class="card-body">
              <div class="d-flex justify-content-end">
                <a href="{{ route('admin.addproduct') }}">
                <button class="btn btn-info btn-rounded m-t-10 mb-2">
                  Add New Product
                </button>
                </a>
              </div>
              <div class="table-responsive">
                <table
                  id="demo-foo-addrow"
                  class="
                    table table-bordered
                    m-t-30
                    table-hover
                    contact-list
                  "
                  data-paging="true"
                  data-paging-size="7"
                >
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      {{-- <th>Product Image</th> --}}
                      <th>Product Quantity</th>
                      <th>Product Short Desc</th>
                      <th>Product Price</th>
                      <th>Product Long Desc</th>
                      <th>Category</th>
                      <th>Sub-Category</th>
                      <th>Slug</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>
                        <a href="javascript:void(0)" class="link"
                          ><img
                            src="{{ asset($product->product_img) }}"
                            alt="user"
                            width="40"
                            class="rounded-circle"
                          />
                          {{ $product->product_name }}</a
                        >
                      </td>
                      <td>{{ $product->quantity }}</td>
                      <td>{{ $product->product_short_desc }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->product_long_desc }}</td>
                      <td>{{ $product->product_category_name }}</td>
                      <td>{{ $product->product_subcategory_name }}</td>
                      <td>{{ $product->slug }}</td>

                      {{-- <td><span class="badge bg-danger">Designer</span></td> --}}
                      <td>
                        <a href="{{ route('admin.editproduct', $product->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('deleteproduct', $product->id) }}" class="btn btn-warning">Delete</a>
                      </td>
                    
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
    </div>

@endsection