@extends('admin.layouts.home')
@section('title', 'Add Sub-Category')
@section('content')

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Add Sub-Category</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Sub-Category</li>
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
         <form action="{{ route('storesubcategory') }}" method="POST">
          @csrf
          <div class="card-body p-4">
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Sub-Category Name</label>
              <div class="col-sm-9">
                <div class="input-group border rounded-1">
                  <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                    <i class="ti ti-user fs-6"></i>
                  </span>
                  <input type="text" class="form-control border-0 ps-2" name="subcategory_name" placeholder="Enter Sub-Category">
                </div>
              @error('subcategory_name') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="mb-4 row align-items-center">
              <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Select Category</label>
              <div class="col-sm-9">
                    <select class="form-select mr-sm-2 col-md-4" id="category_id" name="category_id">
                        <option selected>-- Choose --</option>
                        @foreach ($categories as $category)

                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            
                        @endforeach
                        
                    </select>
              @error('category_id') <p class=" text-danger">{{ $message }}</p> @enderror
              </div>
            </div>
            {{-- <div class="mb-4 row align-items-center">
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
                <Button class="btn btn-primary">Add Sub-category</Button>
              </div>
            </div>
          </div>
        </form>
        </div>

@endsection