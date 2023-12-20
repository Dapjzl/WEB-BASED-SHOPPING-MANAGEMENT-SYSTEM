@extends('admin.layouts.home')
@section('title', 'Pending Orders')
@section('content')
<div class="container-fluid">
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Pending Orders</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">Orders</li>
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
<div class="table-responsive rounded-2 mb-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
      <thead class="text-dark fs-4">
        <tr>
          <th><h6 class="fs-4 fw-semibold mb-0">User Id</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0">Invoice</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0">Product Id</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0">Quantity</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0">Status</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0">Shipping Info</h6></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pending_orders as $order)
          
        <tr>
          <td>
            <div class="d-flex align-items-center">
                <h6 class="fs-4 fw-semibold mb-0">{{ $order->user_id }}</h6>
            </div>
          </td>
          <td><h6 class="fw-semibold mb-0">INV-{{ $order->id }}</h6></td>
          <td><h6 class="fw-semibold mb-0">{{ $order->product_id }}</h6></td>
          <td><h6 class="fw-semibold mb-0">{{ $order->quantity }}</h6></td>
          <td>
            <span class="badge bg-light-primary rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1"><i class="ti ti-check fs-4"></i>{{$order->status}}</span>
          </td>
          <td>
            <div class="d-flex align-items-center">
              {{-- <img src="{{ asset('backend/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="40" height="40" /> --}}
              <div class="ms-3">
                <h6 class="fs-4 fw-semibold mb-0">Phone - {{ $order->shipping_phonenumber }}</h6>
                <span class="fw-normal">City - {{ $order->shipping_city }}</span>
              </div>
            </div>
          </td>
          <td>
            <div class="dropdown dropstart">
              <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-dots-vertical fs-6"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li>
                  <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-plus"></i>Add</a>
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-edit"></i>Edit</a>
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-trash"></i>Delete</a>
                </li>
              </ul>
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection