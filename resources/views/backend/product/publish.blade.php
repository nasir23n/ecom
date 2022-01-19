@extends('backend.layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('common/css/cropper.min.css') }}">
    <script src="{{ asset('common/js/cropper.min.js') }}"></script>
    <div class="panel">
        <div class="header">
            <h3>Product Gallery</h3>
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
                <li><a href="{{ route('product.info.edit', $product->id) }}">Product Info</a></li>
                <li><a href="{{ route('product.gallery', $product->id) }}">Image gallery</a></li>
                <li><a class="active" href="{{ route('product.publish', $product->id) }}">Publish</a></li>
            </ul>
            <br>
            <form action="{{ route('product.publish', $product->id) }}" method="POST">
                @csrf
                <div class="form_group mt3 mb0">
                    <label class="block_checkbox">
                        <input type="checkbox" name="is_publish" class="checkbox success">
                        <span>Do you want to publish this item item? </span>
                    </label>
                </div>
                <br>
                <button type="submit" class="nl success">Publish</button>
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
