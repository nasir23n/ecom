@extends('frontend.layouts.app')

@section('content') 

<section class="content_wrap">
    <div class="container">
        <div class="section_had">
            <h2 class="had">Featured Category</h2>
            <p class="disc">Get Your Desired Product from Featured Category!</p>
        </div>
        <div class="catagory_grid"> 
            @foreach ($catagories as $item)    
            <a href="{{ route('catagory', $item->name) }}" class="catagory">
                <span class="catagory_icon">
                    <img src="{{ asset($item->image) }}" height="50" alt="">
                </span>
                <p>{{ $item->name }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="content_wrap">
    <div class="container">
        <div class="section_had">
            <h2 class="had">Featured Products</h2>
            <p class="disc">Check & Get Your Desired Product!</p>
            <p>
                @php
                    $arr = array();
                    $cart_item = Session::get('cart');
                    foreach ($cart_item as $key => $value) {
                        array_push($arr, $key);
                    }
                @endphp
            </p>
        </div>
        
        <div class="product_grid">
            @foreach ($products as $item) 
            <x-product_component :item="$item" :arr="$arr" />
            @endforeach
        </div>
        <br><b></b>
        <div>
            {{ $products->links('frontend.pages.pagination') }}
        </div>
    </div>
</section>

@endsection