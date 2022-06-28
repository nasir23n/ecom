@extends('backend.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('common/css/cropper.min.css') }}">
<script src="{{ asset('common/js/cropper.min.js') }}"></script>
    <div class="panel">
        <div class="header">
            <h3>Product Add</h3>
        </div>
        <div class="body">
            @if ($errors->any())
                <div class="alert danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }} <br>
                    @endforeach
                </div>
            @endif
            <ul class="tabs">
                <li><a class="active" href="{{ route('product.add') }}">Product Info</a></li>
                <li><a href="#">Image gallery</a></li>
                <li><a href="#">Publish</a></li>
            </ul>
            <br>
            <form action="{{ route('product.info.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form_row">
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form_control" placeholder="Product name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Regular Price</label>
                            <input type="number" name="regular_price" class="form_control" placeholder="Regular Price" value="{{ old('regular_price') }}">
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Sell Price</label>
                            <input type="number" name="sell_price" class="form_control" placeholder="Sell Price" value="{{ old('sell_price') }}">
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form_control" placeholder="Quactity" value="{{ old('quantity') }}">
                        </div>
                    </div>
                    <div class="col_lg_6">
                        <div class="form_group">
                            <label>Catagory</label>
                            <select name="catagory" class="form_control">
                                <option value="" selected>__Catagory__</option>
                                @foreach ($catagories as $item)
                                <option value="{{ $item->id }}">{{ $item->slug }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col_lg_6 flex_center">
                        <div class="form_group mt3 mb0">
                            <label class="block_checkbox">
                                <input type="checkbox" name="is_featured" class="checkbox success">
                                <span>Do you want to add this as a featured item? </span>
                            </label>
                        </div>
                    </div>
                    <div class="col_lg_12">
                        <br>
                        <div class="form_group">
                            <label>Short Description</label>
                            <textarea name="short_description" id="short_description" class="form_control" rows="3" placeholder="Product Short Description">{{ old('short_description') }}</textarea>
                        </div>
                    </div>
                    <div class="col_lg_12">
                        <div class="form_group">
                            <label>Description</label>
                            <textarea name="description" id="product_details" class="form_control" rows="5" placeholder="Product Description">{{ old('description') }}</textarea>
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
    <script>
        // let clicked = false;
        // let is_single = false;
        // let images = [];
        // function signle_disable() {
        //     $('#single_img').attr('disabled', true);
        // }
        // function signle_enable() {
        //     $('#single_img').attr('disabled', false);
        //     is_single = false;
        // }
        // $('#single_img').click(function(e) {
        //     e.preventDefault();
        //     is_single = true;
        //     clicked = '#gal_1';
        //     NL_Modal.open({
        //         title: 'Select and crop',
        //         body: function(body_class, obj) {
        //             $.ajax({
        //                 type: 'get',
        //                 url: url+'admin/product/croup',
        //                 success: function(data) {
        //                     body_class.html(data);
        //                 }
        //             });
        //         }
        //     });
        // });
        // $('#multi_img').click(function(e) {
        //     e.preventDefault();
        //     clicked = '#gal_2';
        //     NL_Modal.open({
        //         title: 'Select and crop',
        //         body: function(body_class, obj) {
        //             $.ajax({
        //                 type: 'get',
        //                 url: url+'admin/product/croup',
        //                 success: function(data) {
        //                     body_class.html(data);
        //                 }
        //             });
        //         }
        //     });
        // });

        // function prev_single(img) {
        //     if (clicked) {
        //         if (clicked == '#gal_1') {
        //             $('#image').val(img);
        //         }
        //         if (clicked == '#gal_2') {
        //             images.push(img);
        //             // console.log(images);
        //             $('#images').val(JSON.stringify(images));
        //         }
        //         $(clicked).append(`
        //             <div class="item">
        //                 <img src="${url}tempr/${img}" alt="">
        //                 <div class="control">
        //                     <button type="button" class="nl danger" onclick="delete_temper(this, '${img}')"><i class="far fa-trash-alt"></i></button>
        //                 </div>
        //             </div>
        //         `);
        //     }
        // }
        // function delete_temper(btn, img) {
        //     if (confirm('Do you want to remove this image?')) {
        //         let data = new FormData();
        //             data.append('image', img);
        //             data.append('_token', '{{ csrf_token() }}');
        //         $.ajax({
        //             url: url + 'admin/remove',
        //             type: 'POST',
        //             data: data,
        //             contentType: false,
        //             cache: false,
        //             processData: false,
        //             success: function (response) {
        //                 if (response == 'delete_success') {
        //                     $(btn).parents('.item').remove();
        //                     images = images.filter((item) => item !== img);
        //                     $('#images').val(JSON.stringify(images));
        //                     console.log($('#images').val());
        //                     signle_enable();
        //                 }
        //             }
        //         });
        //     }
        // }
    </script>
    {{-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
            CKEDITOR.replace('product_details');
    </script> --}}
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({ selector:'textarea' });</script> --}}
@endsection
