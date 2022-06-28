@extends('backend.layouts.app')

@section('content')
<h1 class="content_header">Product Create</h1>

@include('backend.global.alert')

<div class="card">
    <div class="card-header">
        <h4>Create Product</h4>
    </div>
    <div class="card-body">
        

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Product Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-select select2" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="brand_id" class="form-label">Brand</label>
                            <select name="brand_id" class="form-select select2" id="brand_id">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="unit_id" class="form-label">Unit</label>
                            <select name="unit_id" class="form-select select2" id="unit_id">
                                <option value="">Select Unit</option>
                                @foreach ($units as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea name="short_description" id="short_description" rows="3" class="form-control" placeholder="Short Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
        
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" name="is_active" type="checkbox" id="is_active">
                    <label class="form-check-label" for="is_active">
                        Status
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </form>



    </div>
</div>
@endsection