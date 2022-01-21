@extends('backend.layouts.app')

@section('content')
    <div class="panel">
        <div class="head">Add Category</div>
        <div class="body">
            @if (session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table_responsive">
                <table class="table bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catagories as $key => $value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <img src="{{ asset($value->image) }}" alt="" style="max-width: 80px;">
                            </td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('category.edit', $value) }}" class="nl circle warning"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('category.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="nl circle danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection