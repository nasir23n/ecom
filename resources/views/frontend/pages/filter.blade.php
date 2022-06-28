@extends('frontend.layouts.app')

@section('content')



<div class="filter_wrap">
    <div class="container">
        <div class="filter_container">
            <div class="filter_aside">
                <button class="filter_close"><i class="fa fa-times-circle"></i></button>
                <div class="panel expandable active">
                    <div class="head">
                        <span>Categories</span>
                    </div>
                    <div class="body">
                        <ul class="catagory_list">
                            @foreach ($catagories as $item)
                            <li><a class="@if($catagory->id === $item->id) {{ 'active' }} @endif" href="{{ route('catagory', $item->slug) }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="panel expandable active">
                    <div class="head">
                        <span>Price range</span>
                    </div>
                    <div class="body">
                        <div class="range_wrap">
                            <div class="slider_track" style="--left: 20%; --right: 50%;"></div>
                            <input class="range range_1" type="range" value="0" min="0" max="{{ ((int)$max) + 100 }}">
                            <input class="range range_2" type="range" value="{{ ((int)$max) + 100 }}" min="0" max="{{ ((int)$max) + 100 }}">
                            <div class="values">
                                <span class="value_1">0</span>
                                To
                                <span class="value_2">{{ ((int)$max) + 100 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel expandable active">
                    <div class="head">
                        <span>Availability</span>
                    </div>
                    <div class="body filter_check_wrap">
                        <div class="filter_check">
                            <label class="block_checkbox">
                                <input class="checkbox success" type="checkbox">
                                <span>name</span>
                            </label>
                        </div> 
                        <div class="filter_check">
                            <label class="block_checkbox">
                                <input class="checkbox success" type="checkbox">
                                <span>name</span>
                            </label>
                        </div> 
                        <div class="filter_check">
                            <label class="block_checkbox">
                                <input class="checkbox success" type="checkbox">
                                <span>name</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter_content">
                <div class="panel">
                    <div class="head filter_had">
                        <h3 class="had_txt">search head</h3>
                        <button class="aside_toggle"><i class="fas fa-filter"></i></button>
                        <div class="had_right">
                            <div class="select_wrap show">
                                <span>Show:</span>
                                <select class="select" name="show" id="limit">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="select_wrap">
                                <span>Short By:</span>
                                <select class="select" name="select" id="order">
                                    <option value="low_high">Low > High</option>
                                    <option value="high_low">High > Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $arr = array();
                    if ($cart) {
                        foreach ($cart as $key => $value) {
                            array_push($arr, $value['id']);
                        } 
                    }
                @endphp
                <div class="filter_grid" id="products">
                    @foreach ($products as $item)
                    <x-product_component :item="$item" :arr="$arr" />
                    {{-- <div class="product_item">
                        <a href="{{ route('product.details', ['product' => $item->id, 'name' => str_replace(' ', '_', $item->name)]) }}" class="product">
                            <img src="{{ asset('frontend/products/'.$item->image) }}" alt="">
                        </a>
                        <div class="details">
                            <h4 class="product_name">
                                <a href="#">{{ $item->name }}</a>
                            </h4>
                            <div class="btm_fix">
                                <span class="price">{{ $item->regular_price }}৳</span>
                                <div class="cart_fave_qcv">
                                    <button class="cfv"><i class="fas fa-cart-plus"></i> cart</button>
                                    <button class="cfv"><i class="far fa-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @endforeach
                </div>
                {{ $products->links('frontend.pages.pagination') }}
            </div>
        </div>
    </div>
</div>

<script> 

let filter_close = document.querySelector('.filter_close');
$('.aside_toggle').click(function() {
    $('.filter_aside').addClass('active');
}); 
if (filter_close.addEventListener) {
    filter_close.addEventListener('click', function() {
        $('.filter_aside').removeClass('active');
    });
}

if ($('.range_wrap').length) {
    let minGap = 10;
    $('.range_wrap').each(function() {
        let range1 = $(this).find('.range_1');
        let range2 = $(this).find('.range_2');
        let sliderMaxValue = range1.attr('max');
        let sliderTrack = $(this).find('.slider_track');
        let percent1 = (range1.val() / sliderMaxValue) * 100;
        let percent2 = (range2.val() / sliderMaxValue) * 100;
        let value1 = $(this).find('.value_1');
        let value2 = $(this).find('.value_2');
        fill(sliderTrack, percent1, percent2);
        value1.text(range1.val());
        value2.text(range2.val());
        range1.on('input', function() {
            if(parseInt(range2.val()) - parseInt(range1.val()) <= minGap){
                range1.val(parseInt(range2.val()) - minGap);
            }
            percent1 = (range1.val() / sliderMaxValue) * 100;
            percent2 = (range2.val() / sliderMaxValue) * 100;
            value1.text(range1.val());
            fill(sliderTrack, percent1, percent2);
            filterByRange(range1.val(), range2.val());
        });

        range2.on('input', function() {
            if(parseInt(range2.val()) - parseInt(range1.val()) <= minGap){
                range2.val(parseInt(range1.val()) + minGap);
            }
            value2.text(range2.val());
            percent1 = (range1.val() / sliderMaxValue) * 100;
            percent2 = (range2.val() / sliderMaxValue) * 100;
            fill(sliderTrack, percent1, percent2);
            filterByRange(range1.val(), range2.val());
        });
    });
    function fill(target, p1, p2) { 
        target.css('cssText', `background: linear-gradient(to right, #dadae5 ${p1}% , var(--fave) ${p1}% , var(--fave) ${p2}%, #dadae5 ${p2}%)`);
    }
}

let filter_param = {
    low: 0,
    high: '{{ (int)$max }}',
    catagory_id: '{{ $catagory->id }}',
    limit: $('#limit').val(),
    short_by: $('#order').val()
}

let timeout;
function filterByRange(low, high) {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        filter_param.low = low;
        filter_param.high = high;
        filter();
    }, 500);
}

$('#limit').on('change', function() {
    filter_param.limit = $(this).val();
    filter();
});
$('#order').on('change', function() {
    filter_param.short_by = $(this).val();
    filter();
});

function filter() {
    let products = $('#products');
    axios.post(`{{ route("filter") }}`, filter_param)
    .then(response => {
        products.html(response.data);
    })
    .catch(err => console.log(err));
}
</script>

{{-- catagories
limit
short_by --}}
@endsection