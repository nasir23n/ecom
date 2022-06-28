
@extends('backend.layouts.app')

@section('content')
<h1 class="content_header">Brand Create</h1>

@include('backend.global.alert')

<div class="card">
    <div class="card-header">
        <h4>Create Brand</h4>
    </div>
    <div class="card-body">
        
<form action="{{ isset($brand) ? route('admin.brands.update', $brand->id) : route('admin.brands.store') }}" method="POST">
            @if (isset($brand))
                @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Brand name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Brand Name" value="{{ isset($brand) ? $brand->name : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">Brand Details</label>
                            <input type="text" name="details" class="form-control" id="details" placeholder="Brand Details" value="{{ isset($brand) ? $brand->details : '' }}">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" name="status" type="checkbox" id="status" {{ isset($brand) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            @isset($brand)
                            Update Brand
                            @else
                            Save Brand
                            @endisset
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection