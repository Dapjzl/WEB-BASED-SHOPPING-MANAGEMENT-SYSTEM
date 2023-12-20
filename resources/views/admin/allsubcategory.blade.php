@extends('admin.layouts.home')
@section('title', 'All Sub-Category')
@section('content')

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">View Sub-Category</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Subcategory</li>
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
                <a href="{{ route('admin.addsubcategory') }}">
                <button class="btn btn-info btn-rounded m-t-10 mb-2">
                  Add New Sub Category
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
                      <th>Sub-Category Name</th>
                      <th>Category</th>
                      <th>Product</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($subcategories as $subcategory)
                    <tr>
                      <td>{{ $subcategory->id }}</td>
                      <td>
                        <a href="javascript:void(0)" class="link"
                          >
                          {{ $subcategory->subcategory_name }}</a
                        >
                      </td>
                      <td>{{ $subcategory->category_name }}</td>
                      <td>{{ $subcategory->product_count }}</td>
                      {{-- <td><span class="badge bg-danger">Designer</span></td> --}}
                      <td>
                        <a href="{{ route('admin.editsubcategory',$subcategory->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('deletesubcategory', $subcategory->id) }}" class="btn btn-warning">Delete</a>
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