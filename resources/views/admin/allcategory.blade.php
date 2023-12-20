@extends('admin.layouts.home')
@section('title', 'All Categories')
@section('content')
<div class="container-fluid">
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">View Category</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">Category</li>
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
            <a href="{{ route('admin.addcategory') }}">
            <button class="btn btn-info btn-rounded m-t-10 mb-2">
              Add New Category
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
                <th>Category Name</th>
                <th>Sub-Category</th>
                <th>Product</th>
                <th>Slug</th>
                <th>Actions</th>
              </tr>
            </thead>
        @foreach ($categories as $category )
            <tbody>
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->subcategory_count }}</td>
                <td>{{ $category->product_count }}</td>
                <td>{{ $category->slug }}</td>
                {{-- <td><span class="badge bg-danger">Designer</span></td> --}}
                <td>
                  <a href="{{ route('admin.editcategory',$category->id) }}" class="btn btn-primary">Edit</a>
                  <a href="{{ route('deletecategory',$category->id) }}" class="btn btn-warning">Delete</a>
                </td>
              </tr>
            </tbody>
        @endforeach
          </table>
        </div>
        </div>
      </div>
</div>
</div>
@endsection