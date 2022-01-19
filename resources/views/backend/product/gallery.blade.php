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
                <li><a class="active" href="{{ route('product.gallery', $product->id) }}">Image gallery</a></li>
                <li><a href="{{ route('product.publish', $product->id) }}">Publish</a></li>
            </ul>
            <br>
            <div>
                <div class="form_row">
                    <div class="col_lg_12">
                        <div class="form_group">
                            <label><h1>Product display image</h1></label> 
                            <br>
                            <button type="button" class="nl primary" id="single_img">Chose an image</button> 
                            <div class="gallery" id="gal_1">
                                @if ($product->image)
                                <div class="item">
                                    <img src="{{ asset('frontend/products') }}/{{ $product->image }}" alt="">
                                    <div class="control">
                                        <button class="nl danger" onclick="delete_single(this, '{{ $product->image }}')"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </div>
                                @endif
                            </div> 
                        </div>
                    </div>
                    <div class="col_lg_12">
                        <br>    
                        <hr>
                        <div class="form_group">
                            <label><h1>Image Gallery</h1></label> 
                            <br>
                            <button type="button" class="nl primary" id="multi_img">Chose an image</button> 
                            <div class="gallery" id="gal_2">
                                @if ($product->images)
                                    @php
                                        $images = json_decode($product->images);
                                    @endphp
                                    @foreach ($images as $item)    
                                        <div class="item">
                                            <img src="{{ asset('frontend/products') }}/{{ $item }}" alt="">
                                            <div class="control">
                                                <button class="nl danger" onclick="delete_multi(this, '{{ $item }}')"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div> 
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div> 
    <style>
        .multiple_group {
            display: flex; 
            flex-wrap: wrap
        }
        .prev_wrap {
            flex: 1;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 150px));
            grid-gap: 10px;
        }
        .gallery .item {
            border: 1px solid #ddd;
        }
        .gallery .control {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
        }
        .gallery .control .nl {
            border-radius: 0 !important;
        }
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

    <script>
        let upload_to = false;
        $('#single_img').click(function() {
            NL_Modal.open({
                title: 'Croup image',
                preload: true,
                body: function(body_class, obj) {
                    $.ajax({
                        type: 'get',
                        url: url + 'admin/product/croup',
                        success: function(data) {
                            body_class.html(data);
                            upload_to = '#gal_1';
                        }
                    });
                }
            });
        });
        $('#multi_img').click(function() {
            NL_Modal.open({
                title: 'Croup image',
                preload: true,
                body: function(body_class, obj) {
                    $.ajax({
                        type: 'get',
                        url: url + 'admin/product/croup',
                        success: function(data) {
                            upload_to = '#gal_2';
                            body_class.html(data);
                        }
                    });
                }
            });
        });
        function save(data) {
            if (upload_to == '#gal_1') {   
                $.ajax({
                    url: url + 'admin/product/{{ $product->id }}/single_upload',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        preview(response);
                        NL_Modal.close();
                    }
                });
            }
            if (upload_to == '#gal_2') {
                $.ajax({
                    url: url + 'admin/product/{{ $product->id }}/multi_upload',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        preview(response);
                        NL_Modal.close();
                    }
                });
            }
        }
        
        function preview(imgs) {
            if (upload_to == '#gal_1') {
                if (imgs == 1) {
                    $(upload_to).html('');
                }
                $(upload_to).html(`
                    <div class="item">
                        <img src="${url}frontend/products/${imgs}" alt="">
                        <div class="control">
                            <button type="button" class="nl danger" onclick="delete_single(this, '${imgs}')"><i class="far fa-trash-alt"></i></button>
                        </div>
                    </div>
                `);
            }
            if (upload_to == '#gal_2') {
                let img_arr = JSON.parse(imgs);
                let htm = '';
                img_arr.forEach(item => {
                    htm += `<div class="item">
                                <img src="${url}frontend/products/${item}" alt="">
                                <div class="control">
                                    <button type="button" class="nl danger" onclick="delete_multi(this, '${item}')"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>`;
                });
                $(upload_to).html(htm);
            }
        }

        function delete_multi(e, img) { 
            let data = new FormData();
                data.append('_token', '{{ csrf_token() }}');
                data.append('image', img);
            upload_to = '#gal_2';
            $.ajax({
                url: url + 'admin/product/{{ $product->id }}/delete_multi',
                type: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    preview(response);
                }
            });
        }
        function delete_single(e, img) { 
            let data = new FormData();
                data.append('_token', '{{ csrf_token() }}');
                data.append('image', img);
            upload_to = '#gal_1';
            $.ajax({
                url: url + 'admin/product/{{ $product->id }}/delete_single',
                type: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    preview(response);
                }
            });
        }
    </script>

@endsection
