@extends('admin.layouts.home')
@section('title', 'Add Category')
@section('content')
<div class="container-fluid">
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Add Category</h4>
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
  <form action="{{ route('storecategory') }}" id="apply_online" method="POST">
        @csrf
        <div class="card-body p-4">
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Category Name</label>
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
                  <input type="text" name="category_name" class="form-control border-0 ps-2" placeholder="Category Name">
                </div>
                @error('category_name') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            {{-- <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Company</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <i class="ti ti-building-arch fs-6"></i>
                  </span>
                  <input type="text" class="form-control border-0 ps-2" placeholder="ACME Inc.">
                </div>
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <i class="ti ti-mail fs-6"></i>
                  </span>
                  <input type="text" class="form-control border-0 ps-2" placeholder="John Deo@email.com">
                </div>
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Phone No</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <i class="ti ti-phone fs-6"></i>
                  </span>
                  <input type="text" class="form-control border-0 ps-2" placeholder="412 2150 451">
                </div>
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Message</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <i class="ti ti-message-2 fs-6"></i>
                  </span>
                  <textarea class="form-control p-7 border-0 ps-2" name="" id="" cols="20" rows="1" placeholder="Hi, Do you  have a moment to talk Jeo ?"></textarea>
                </div>
              </div>
            </div> --}}
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9">
                <Button class="btn btn-primary">Add Category</Button>
              </div>
            </div>
          </div>
     </form>
      
    </div>
@endsection