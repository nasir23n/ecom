@extends('frontend.layouts.app')

@section('content')


<div class="main">
    @csrf
    <div class="container">
        <br>
        <h1>Order</h1>
        <div class="panel">
            <div class="head">
                <h2>Order Overview</h2>
            </div>
            <div class="body">
                <div class="table_responsive">
                    <table class="table bordered cart_table">
                        <thead>
                            <tr>
                                <th style="width: 80px;" class="cart_img">Image</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($orders as $item)
                            <tr class="servicing_row" s_id="2">
                                <td class="cart_img">
                                    <img src="{{ asset('frontend/products') }}/{{ $item->image }}" alt="">
                                </td>
                                <td>
                                    <span>{{ $item->product_name }}</span>
                                </td>
                                <td>{{ $item->price }}TK</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price * $item->quantity }}TK</td>
                                <td>{{ $item->delivery_status }}</td>
                                <td>
                                    <button type="button" class="nl"><i class="fas fa-pencil-alt"></i></button>
                                </td> 
                            </tr>
                            @php 
                                $total += $item->price * $item->quantity;
                            @endphp
                            @endforeach 
                            <tr class="result">
                                <td colspan="4" class="title">Total</td>
                                <td colspan="2" class="out">
                                    <span id="total">{{ $total }}</span>
                                    TK
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br><br><br>
    </div>
</div>


@endsection