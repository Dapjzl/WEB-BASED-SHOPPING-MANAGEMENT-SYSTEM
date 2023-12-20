@extends('front.layouts.home')
@section('title', 'Pending Orders')
@section('content')
    @if (session()->has('message'))
        <div class = "alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


    <div class="profile__ticket table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"> # 2245</th>
                    <td data-info="title">How can i share ?</td>
                    <td data-info="status pending">Pending </td>
                    <td><a href="#" class="tp-logout-btn">Invoice</a></td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection
