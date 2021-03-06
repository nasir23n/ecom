
@extends('backend.layouts.app')

@section('content')
<h1 class="content_header">Category Create</h1>

@include('backend.global.alert')

<div class="card">
    <div class="card-header">
        <h4>Create Category</h4>
    </div>
    <div class="card-body">

        <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
            @if (isset($category))
                @method('PUT')
            @endif

            @csrf
            <div class="form-group">
                <div class="row my-3">
                    <div class="col-md-{{ request()->ajax() ? '12' : '6' }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Brand Name" value="{{ isset($category) ? $category->name : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">Category Details</label>
                            <input type="text" name="details" class="form-control" id="details" placeholder="Brand Details" value="{{ isset($category) ? $category->details : '' }}">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" name="status" type="checkbox" id="status" {{ isset($category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            @isset($category)
                            Update Category
                            @else
                            Save Category
                            @endisset
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection