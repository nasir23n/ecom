@extends('backend.layouts.app')

@section('content')

<h1 class="content_header">Orders</h1>

@include('backend.global.alert')

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0">Order List</h5>
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <thead class="">
                <tr>
                    <th>S/L</th>
                    <th>User Name</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th style="max-width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->delivery_status ? 'Done' : 'Pending' }}</td>
                        <td>{{ date('Y-m-d H:s:A', strtotime($order->created_at)) }}</td>
                        <td>
                            <div class="d-flex gap-2" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                <form action="{{ route('admin.orders.confirm', $order) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success"><i class="far fa-check-circle"></i></button>                                
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $categories->links() }} --}}
    </div>
</div>

@endsection