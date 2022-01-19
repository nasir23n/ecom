@extends('backend.layouts.app')

@section('content')
    <div class="panel">
        <div class="header">
            <h3>All Products</h3>
        </div>
        <div class="body">
            @if (session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table_responsive">
                <table class="table bordered">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Image</th>
                            <th>Name</th>
                            <th style="width: 80px;">Status</th> 
                            <th style="width: 100px;">Price</th> 
                            <th style="width: 80px;">Quantity</th>
                            <th style="width: 130px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_product as $item)
                            <tr>
                                <td class="product_img">
                                    <img src="{{ asset('frontend/products') }}/{{ $item->image }}" alt="">
                                </td>
                                <td>{{ $item->name }}</td> 
                                <td>
                                    @if ($item->is_active == 0)
                                        <span class="badges danger">Draft</span>
                                    @else
                                        <span class="badges success">Published</span>
                                    @endif
                                </td>
                                <td>{{ $item->regular_price }}TK</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <div class="flex">
                                        <a href="{{ route('product.info.edit', $item) }}" class="nl circle warning"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="nl circle danger"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            {{ $all_product->links('backend.paginator.my_paginator') }}
        </div>
    </div>
@endsection