@extends('frontend.layouts.app')

@section('content')

<div class="single_view">
    <div class="container">
        <div class="quick_overviews">
            <!-- <button class="option"><i class="fas fa-comment-dots"></i> 0 Comments</button> -->
            <div class="quick_right">
                <button class="option"><i class="fas fa-cart-plus"></i> Add to cart</button>
                <!-- <button><i class="fas fa-bookmark"></i> Save</button> -->
            </div>
        </div>
        <div class="single">
            <div class="gallery_box">
                <a href="javascript:void(0)" class="big_box">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                </a>
                <div class="gallery_link">
                    <img src="{{ asset($product->image) }}" alt="">
                </div>
            </div>
            <div class="specification">
                <h2 class="name">{{ $product->name }}</h2>
                <div class="p_status">
                    <span class="badge">
                        Price: <strong>{{ $product->price }}৳</strong>
                    </span>
                </div>
                <h2>Description:</h2>
                <p>
                    {{ $product->short_description }}
                </p>
                {{-- <ul class="key_features">
                    <li>Model: Havit HV-MS753</li>
                    <li>Hand Orientation: Both Hands</li>
                    <li>Mouse 1000 dpi</li>
                    <li>Interface Type: USB</li>
                    <li>Tracking Method: Optical</li>
                </ul> --}}
                <a class="more_info" href="javascript:void(0)">View More Info</a>
                <h2>Select Quantity</h2>
                <div class="quantity_box">
                    <button class="inc_dec" id="dec"><i class="fas fa-minus"></i></button>
                    <input type="number" class="inp" id="quentity" min="1" max="5" value="1">
                    <button class="inc_dec" id="inc"><i class="fas fa-plus"></i></button>
                </div>
                <button class="nl primary buy" onclick="add_cart(this, '{{ $product->id }}')">Buy Now</button>
            </div>
        </div>
    </div>
</div>
<div class="product_details_box">
    <div class="container">
        <div class="details_wrap">
            <div class="details">
                <div class="panel">
                    <div class="head">
                        <h2>Description</h2>
                    </div>
                    <div class="body">
                        {{ $product->description }}
                    </div>
                </div>
                <div class="panel">
                    <div class="head">
                        <h2>Comment</h2>
                    </div>
                    <div class="body">
                        <div class="comment">
                            <a href="#" class="profile_wrap">
                                <img class="profile" src="{{ asset('frontend/image/product3.jpg') }}" alt="John Doe">
                            </a>
                            <div class="comment_body">
                                <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <hr>
                                <div class="comment">
                                    <a href="#" class="profile_wrap">
                                        <img class="profile" src="{{ asset('frontend/image/product3.jpg') }}" alt="John Doe">
                                    </a>
                                    <div class="comment_body">
                                        <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="aside">
                <div class="panel">
                    <div class="head">
                        <h2>Related Product</h2>
                    </div>
                    <div class="body aside_product">
                        @foreach ($related_product as $item)   
                        <div class="item">
                            <a href="#" class="img">
                                <img src="{{ asset($item->image) }}" alt="">
                            </a>
                            <div class="details">
                                <a href="{{ route('product.details', ['product' => $item->id, 'name' => $item->name]) }}" class="name">
                                    {{ $item->name }}
                                </a>
                                <div class="price">
                                    {{ $item->price }}৳
                                </div>
                                <button class="add_card" onclick="add_cart(this, '{{ $item->id }}', '{{ $item->name }}', '{{ $item->regular_price }}', '{{ $item->image }}')"><i class="fas fa-cart-plus"></i> Add to card</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.comment {
    display: flex;
    gap: 10px;
    padding: 20px 0;
}
.comment .profile_wrap {
    display: block;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 1px solid #ddd;
    background: #ddd;
    overflow: hidden;
}
.comment .profile {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}
.comment .comment_body {
    margin-bottom: 10px;
}
.comment .comment .profile_wrap {
    width: 40px;
    height: 40px;
}
</style>

@endsection