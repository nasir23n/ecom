<div class="product_item">
    <a href="{{ route('product.details', $item->slug) }}" class="product">
        <img src="{{ asset($item->image) }}" alt="">
    </a>
    <div class="details">
        <h4 class="product_name">
            <a href="#">{{ $item->name }}</a>
        </h4>
        <div class="btm_fix">
            <span class="price">{{ $item->price }}৳</span>
            <div class="cart_fave_qcv">
                <button class="cfv @if(in_array($item->id, $arr)) active @endif" onclick="add_cart(this, '{{ $item->id }}')"><i class="fas fa-cart-plus"></i> cart</button>
                <button class="cfv"><i class="far fa-heart"></i></button>
            </div>
        </div>
    </div>
</div>