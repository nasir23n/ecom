@extends('backend.layouts.app')

@section('content')

<h1 class="content_header">Unit</h1>

@include('backend.global.alert')

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0">Unit List</h5>
        <a href="{{ route('admin.units.create') }}" class=" btn btn-primary"><i class="fa fa-plus"></i> Create</a>
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <thead class="">
                <tr>
                    <th>S/L</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th style="max-width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->details }}</td>
                        <td>
                            @if ($item->status)
                                <span class="badge text-bg-green-600">Active</span>
                            @else
                                <span class="badge text-bg-red-600">Diactive</span>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a class="btn btn-sm btn-primary edit" href={{ route('admin.units.edit', $item) }}><i class="fa fa-pen"></i></a>
                                <form action="{{ route('admin.units.destroy', $item) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>                                
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $units->links() }}
    </div>
</div>


@endsection