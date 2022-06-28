
@extends('backend.layouts.app')

@section('content')
<h1 class="content_header">Unit Create</h1>

@include('backend.global.alert')

<div class="card">
    <div class="card-header">
        <h4>Create Unit</h4>
    </div>
    <div class="card-body">

        <form action="{{ isset($unit) ? route('admin.units.update', $unit->id) : route('admin.units.store') }}" method="POST">
            @if (isset($unit))
                @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <div class="row my-3">
                    <div class="col-md-{{ request()->ajax() ? '12' : '6' }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Unit name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Unit Name" value="{{ isset($unit) ? $unit->name : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">Unit Details</label>
                            <input type="text" name="details" class="form-control" id="details" placeholder="Unit Details" value="{{ isset($unit) ? $unit->details : '' }}">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" name="status" type="checkbox" id="status" {{ isset($unit) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            @isset($unit)
                            Update Unit
                            @else
                            Save Unit
                            @endisset
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection