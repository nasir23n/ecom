@extends('frontend.layouts.app')

@section('content')


<form action="{{ route('order.checkout') }}" class="main" method="POST">
    @csrf
    <div class="container">
        <br>
        <h1>Checkout</h1>
        @if (!Auth::check())
            <div class="panel">
                <div class="head">
                    <h2>Customer Info</h2>
                </div>
                <div class="body">
                    <div class="info_grid">
                        <div>
                            <label>Customer Name</label>
                            <input type="text" class="form_control" placeholder="Name..">
                        </div>
                        <div>
                            <label>Phone</label>
                            <input type="number" class="form_control" placeholder="Phone..">
                        </div>
                        <div>
                            <label>Address</label>
                            <input type="text" class="form_control" placeholder="Address..">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" class="form_control" placeholder="Email..">
                        </div>
                        <div style="grid-column: 1/3;">
                            <label>Comment</label>
                            <textarea name="comment" rows="3" class="form_control" placeholder="Comment.."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="pay_delivery">
            <div class="panel">
                <div class="head">
                    <h2>Payment Method</h2>
                </div>
                <div class="body">
                    <p>Select payment method</p>
                    <div class="form_row">
                        <label class="radio warning">
                            <input type="radio" name="payment_method" value="cash_on_delivery" checked>
                            <span></span>Cash on Delivery
                        </label>
                        <label class="radio warning">
                            <input type="radio" name="payment_method" value="online_payment">
                            <span></span>Online Payment
                        </label>
                    </div>
                    <br>
                    <h4>We Accept:</h4>
                    <div class="pay_card">
                        <img src="image/payment_logo.png" alt="">
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="head">
                    <h2>Delivery Method</h2>
                </div>
                <div class="body">
                    <p>Select Delivery Method</p>
                    <div class="form_group">
                        <label class="radio warning">
                            <input type="radio" name="delivery_method" value="cash_on_delivery" checked>
                            <span></span>Cash on Delivery
                        </label>
                        <br>
                        <label class="radio warning">
                            <input type="radio" name="delivery_method" value="online_payment">
                            <span></span>Online Payment
                        </label>
                    </div>
                </div>
            </div>
        </div>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart_item as $item)
                            <tr class="servicing_row" s_id="2">
                                <td class="cart_img">
                                    <img src="{{ asset('frontend/products') }}/{{ $item->image }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('product.details', ['product' => $item->id, 'name' => $item->name]) }}">{{ $item->name }}</a>
                                </td>
                                <td>{{ $item->regular_price }}TK</td>
                                <td>{{ $item->cart_quantity }}</td>
                                <td>{{ $item->regular_price * $item->cart_quantity }}TK</td>
                                <td>
                                    <button type="button" class="nl" onclick="remove_cart(this, '{{ $item->product_id }}', '{{ $item->regular_price * $item->cart_quantity }}')"><i class="fas fa-times"></i></button>
                                </td> 
                            </tr>
                            @php 
                                $total += $item->regular_price * $item->cart_quantity;
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

        <br>
        <hr>
        <br>
        <div class="order">
            <label class="block_checkbox">
                <input name="terms_and_condition" class="checkbox x3 success" type="checkbox" checked>
                <span>I have read and agree to the Terms and Conditions, Privacy Policy and Refund and Return Policy</span>
            </label>
            <Button type="submit" class="nl primary ml_auto">Confirm Order</Button>
        </div>
        <br><br><br>
    </div>
</form>

<script>
    function remove_cart(sel, product_id, price) {
        axios.post('{{ route("cart.remove") }}', {
            product_id
        })
        .then(function (response) {
            console.log(response);
            if (response.data == 'removed') {
                $(sel).parents('.servicing_row').remove(); 
                re_total(price);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    }
    function re_total(price, sub_add=false) {
        let total = $("#total");
        let total_price = total.text();
        if (sub_add) {
            total.html(parseFloat(total_price) + parseFloat(price)); 
        } else {
            total.html(parseFloat(total_price) - parseFloat(price));
        }
    }
</script>

@endsection