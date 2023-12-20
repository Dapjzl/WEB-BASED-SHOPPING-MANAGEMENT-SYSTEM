@extends('admin.layouts.home')
@section('title', 'Update Sub-Category')
@section('content')
<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
      <div class="card-body px-4 py-3">
        <div class="row align-items-center">
          <div class="col-9">
            <h4 class="fw-semibold mb-8">Update Category</h4>
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
    <form action="{{ route('updatesubcategory') }}" id="apply_online" method="POST">
        @csrf
        <input type="hidden" value="{{ $subcategory_info->id }}" name="subcategory_id">
        <div class="card-body p-4">
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Sub-Category Name</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M10 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" stroke-width="0" fill="currentColor"></path>
                      <path d="M20 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" stroke-width="0" fill="currentColor"></path>
                      <path d="M10 13h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" stroke-width="0" fill="currentColor"></path>
                      <path d="M17 13a4 4 0 1 1 -3.995 4.2l-.005 -.2l.005 -.2a4 4 0 0 1 3.995 -3.8z" stroke-width="0" fill="currentColor"></path>
                   </svg>
                  </span>
                  <input type="text" name="subcategory_name" class="form-control border-0 ps-2" value="{{ $subcategory_info->subcategory_name }}">
                  @error('subcategory_name') <p class=" text-danger">{{ $message }}</p> @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9">
                <Button class="btn btn-primary">Update Sub-Category</Button>
              </div>
            </div>
        </div>
     </form>
    </div>
@endsection