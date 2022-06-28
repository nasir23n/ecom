@extends('frontend.layouts.app')

@section('content')

@include('frontend.user.inc.panel_top', ['head' => 'Orders'])
<div class="table_responsive">
    

    @foreach ($orders as $key => $order)
    <table class="table bordered cart_table">
        <thead>
            <tr>
                <th colspan="2">Order No</th>
                <th colspan="4">{{ $key+1 }}</th>
            </tr>
            <tr>
                <th colspan="2">Status</th>
                <th colspan="4">
                    @if ($order->delivery_status)
                        <strong>Done</strong>
                    @else
                        <strong>Pending</strong>
                    @endif
                </th>
            </tr>
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
                        <img src="{{ asset($item->product->image) }}" alt="">
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

    @endforeach
</div>
@include('frontend.user.inc.panel_bottom')

@endsection