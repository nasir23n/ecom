@extends('backend.layouts.app')

@section('content')

<h1 class="content_header">Orders</h1>

@include('backend.global.alert')

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0">Order List</h5>
        <a href="{{ route('admin.orders') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> Back</a>
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <thead class="">
                <tr>
                    <th style="width: 80px;" class="cart_img">Image</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($order->details as $item)
                    <tr>
                        <td class="cart_img">
                            <img width="80px" src="{{ asset($item->product->image) }}" alt="">
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->price }}TK</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price * $item->qty }}TK</td>
                    </tr>
                    @php
                        $total += $item->price * $item->qty;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                    <td colspan="4">{{ $total }}TK</td>
                </tr>
            </tbody>
        </table>
        {{-- {{ $categories->links() }} --}}
    </div>
</div>

@endsection