@extends('backend.layouts.app')

@section('content')
    <div class="panel">
        <div class="header">
            <h3>Product Info Update</h3>
        </div>
        <div class="body">
            @if ($errors->any())
                <div class="alert danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }} <br>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>    
            @endif
            <ul class="tabs">
                <li><a class="active" href="{{ route('product.info.edit', $product->id) }}">Product Info</a></li>
                <li><a href="{{ route('product.gallery', $product->id) }}">Image gallery</a></li>
                <li><a href="{{ route('product.publish', $product->id) }}">Publish</a></li>
            </ul>
            <br>
            <form action="{{ route('product.info.update', $product->id) }}" method="post">
                @csrf
                <div class="form_row">
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form_control" placeholder="Product name" value="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Regular Price</label>
                            <input type="number" name="regular_price" class="form_control" placeholder="Regular Price" value="{{ $product->regular_price }}">
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Sell Price</label>
                            <input type="number" name="sell_price" class="form_control" placeholder="Sell Price" value="{{ $product->sale_price }}">
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form_control" placeholder="Quactity" value="{{ $product->quantity }}">
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Catagory</label>
                            <select name="catagory" class="form_control">
                                <option value="">__Catagory__</option>
                                @foreach ($catagories as $item)
                                    @if ($product->category_id == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->slug }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->slug }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col_lg_6 flex_center">
                        <div class="form_group mt3 mb0">
                            <label class="block_checkbox">
                                <input type="checkbox" name="is_featured" class="checkbox success" @if($product->featured) checked @endif>
                                <span>Do you want to add this as a featured item? </span>
                            </label>
                        </div>
                    </div>
                    <div class="col_lg_12">
                        <br>
                        <div class="form_group">
                            <label>Short Description</label>
                            <textarea name="short_description" id="short_description" class="form_control" rows="3" placeholder="Product Short Description">{{ $product->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="col_lg_12">
                        <div class="form_group">
                            <label>Description</label>
                            <textarea name="description" id="product_details" class="form_control" rows="5" placeholder="Product Description">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <button class="nl primary" type="submit">Save</button>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
    </div> 
    <style>
        .tabs {
            display: flex;
        }
        .tabs li a:hover {
            background: var(--secondary);
        }
        .tabs li a {
            display: block;
            padding: 10px;
            border: 1px solid var(--secondary);
            margin-left: -1px;
            background: var(--primary);
            color: #ffffff;
            transition: all 0.2s ease-in-out;
        }
        .tabs li a.active {
            background: var(--secondary);
            position: relative
        }
        .tabs li a.active::before {
            content: '';
            display: block;
            width: 0;
            height: 0;
            border-top: 15px solid var(--secondary);
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translate(-50%);
        }
    </style>

@endsection
