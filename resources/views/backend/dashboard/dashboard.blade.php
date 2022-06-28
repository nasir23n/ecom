@extends('backend.layouts.app')

@section('content')

<h3 class="content_header">Dashboard</h3>
<div class="row">
    <div class="col-md-12 mb-4">
        {{-- <button id="nl_modal" class="btn btn-primary">modal</button> --}}
    </div>
</div>
<div class="widget_wrap">
    <div class="card text-bg-blue-700 shadow">
        <div class="card-body widget_body">
            <div class="content">
                <p>Total User</p>
                <strong>{{ $total_user }} customers</strong>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="card-footer widget_footer">
            <a href="{{ route('admin.users') }}">All User  &nbsp;<i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>
    <div class="card text-bg-purple-600 shadow">
        <div class="card-body widget_body">
            <div class="content">
                <p>Total Order</p>
                <strong>{{ $total_order }}TK</strong>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
        </div>
        <div class="card-footer widget_footer">
            <a href="{{ route('admin.orders') }}">All Order &nbsp;<i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>
    <div class="card text-bg-orange-500 shadow">
        <div class="card-body widget_body">
            <div class="content">
                <p>Today Order</p>
                <strong>{{ $today_order }}TK</strong>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="card-footer widget_footer">
            <a href="{{ route('admin.orders') }}">All Order  &nbsp;<i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>
    <div class="card text-bg-green-700 shadow">
        <div class="card-body widget_body">
            <div class="content">
                <p>Total Product</p>
                <strong>{{ $total_product }} Product</strong>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="card-footer widget_footer">
            <a href="{{ route('admin.products.index') }}">All Product &nbsp;<i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>
</div>

<br>

{{-- <div class="card">
    <div class="card-header border-primary" style="border-top: 4px solid;border-bottom: 0;background:transparent;">
        <h4>Servicing this month</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 80px;">S/L</th>
                        <th>Customer</th>
                        <th>phone</th>
                        <th>Date</th>
                        <th style="width:100px;">Delivary</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Remaining</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="actionable_row">
                        <td>1</td>
                        <td>Keane Stephenson</td>
                        <td>12245865832</td>
                        <td>07-Jun-2022</td>
                        <td>
                            <div class="badge bg-danger">Painding</div>
                        </td>
                        <td>200TK</td>
                        <td>76TK</td>
                        <td>
                            <div class="badge bg-danger">124TK</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">Total</td>
                        <td>200TK</td>
                        <td>76TK</td>
                        <td>
                            <div class="check_wrap">
                                <span class="check danger"></span>124TK
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

{{-- 
<div class="row mb-3 gy-4 gx-4">
    
    <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card shadow-sm rounded border-0">
            <div class="card-body">
                <div class="d-flex">
                    <span class="text-bg-blue-600 mb-0 d-flex justify-content-center align-items-center h3 py-2 px-4 rounded">
                        <i class="fab fa-btc"></i>
                    </span>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mt-0 mb-1 font-20">$12,500</h4>
                        <p class="mb-0"><i class="fas fa-angle-double-up"></i> 45% This Week</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card shadow-sm rounded border-0">
            <div class="card-body">
                <div class="d-flex">
                    <span class="text-bg-red-600 mb-0 d-flex justify-content-center align-items-center h3 py-2 px-3 rounded">
                        <i class="fab fa-usb"></i>
                    </span>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mt-0 mb-1 font-20">$12,500</h4>
                        <p class="mb-0"><i class="fas fa-angle-double-up"></i> 45% This Week</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card shadow-sm rounded border-0">
            <div class="card-body">
                <div class="d-flex">
                    <span class="text-bg-blue-500 mb-0 d-flex justify-content-center align-items-center h3 py-2 px-3 rounded">
                        <i class="fas fa-upload"></i>
                    </span>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mt-0 mb-1 font-20">$12,500</h4>
                        <p class="mb-0"><i class="fas fa-angle-double-up"></i> 45% This Week</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card shadow-sm rounded border-0">
            <div class="card-body">
                <div class="d-flex">
                    <span class="text-bg-yellow-500 mb-0 d-flex justify-content-center align-items-center h3 py-2 px-3 rounded">
                        <i class="fas fa-undo"></i>
                    </span>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mt-0 mb-1 font-20">$12,500</h4>
                        <p class="mb-0"><i class="fas fa-angle-double-up"></i> 45% This Week</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card shadow-sm rounded border-0">
            <div class="card-body">
                <div class="d-flex">
                    <span class="text-bg-purple-600 mb-0 d-flex justify-content-center align-items-center h3 py-2 px-3 rounded">
                        <i class="fas fa-shopping-basket"></i>
                    </span>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mt-0 mb-1 font-20">$12,500</h4>
                        <p class="mb-0"><i class="fas fa-angle-double-up"></i> 45% This Week</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card shadow-sm rounded border-0">
            <div class="card-body">
                <div class="d-flex">
                    <span class="text-bg-success mb-0 d-flex justify-content-center align-items-center h3 py-2 px-3 rounded">
                        <i class="fab fa-shopware"></i>
                    </span>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mt-0 mb-1 font-20">$12,500</h4>
                        <p class="mb-0"><i class="fas fa-angle-double-up"></i> 45% This Week</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> --}}

{{-- 
<div class="row g-4 my-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header-title mb-0">Transaction List</h4>
                    <div>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected="">Today</option>
                            <option value="1">Yesterday</option>
                            <option value="2">Tomorrow</option>
                        </select>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-circle" src="assets/image/user.svg" alt="Avtar image" width="33">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            Adam Baldwin
                                        </div>
                                    </div>
                                </td>
                                <td><i class="far fa-calendar me-1"></i>Jan 01, 2022</td>
                                <td>
                                    <span class="badge text-bg-blue-100 text-success">Incoming</span>
                                </td>
                                <td>
                                    <span class="text-success fw-semibold">+ $2,586.60</span>
                                </td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" class="text-info me-2" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-pen-alt"></i></a>
                                    <a href="javascript:void(0)" class="text-danger" data-bs-custom-class="tooltip-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-circle" src="assets/image/user.svg" alt="Avtar image" width="33">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            Adam Baldwin
                                        </div>
                                    </div>
                                </td>
                                <td><i class="far fa-calendar me-1"></i>Jan 01, 2022</td>
                                <td>
                                    <span class="badge text-bg-blue-100 text-success">Incoming</span>
                                </td>
                                <td>
                                    <span class="text-success fw-semibold">+ $2,586.60</span>
                                </td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" class="text-info me-2" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-pen-alt"></i></a>
                                    <a href="javascript:void(0)" class="text-danger" data-bs-custom-class="tooltip-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-circle" src="assets/image/user.svg" alt="Avtar image" width="33">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            Adam Baldwin
                                        </div>
                                    </div>
                                </td>
                                <td><i class="far fa-calendar me-1"></i>Jan 01, 2022</td>
                                <td>
                                    <span class="badge text-bg-blue-100 text-success">Incoming</span>
                                </td>
                                <td>
                                    <span class="text-success fw-semibold">+ $2,586.60</span>
                                </td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" class="text-info me-2" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-pen-alt"></i></a>
                                    <a href="javascript:void(0)" class="text-danger" data-bs-custom-class="tooltip-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-circle" src="assets/image/user.svg" alt="Avtar image" width="33">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            Adam Baldwin
                                        </div>
                                    </div>
                                </td>
                                <td><i class="far fa-calendar me-1"></i>Jan 01, 2022</td>
                                <td>
                                    <span class="badge text-bg-blue-100 text-success">Incoming</span>
                                </td>
                                <td>
                                    <span class="text-success fw-semibold">+ $2,586.60</span>
                                </td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" class="text-info me-2" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-pen-alt"></i></a>
                                    <a href="javascript:void(0)" class="text-danger" data-bs-custom-class="tooltip-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-circle" src="assets/image/user.svg" alt="Avtar image" width="33">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            Adam Baldwin
                                        </div>
                                    </div>
                                </td>
                                <td><i class="far fa-calendar me-1"></i>Jan 01, 2022</td>
                                <td>
                                    <span class="badge text-bg-blue-100 text-success">Incoming</span>
                                </td>
                                <td>
                                    <span class="text-success fw-semibold">+ $2,586.60</span>
                                </td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" class="text-info me-2" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-pen-alt"></i></a>
                                    <a href="javascript:void(0)" class="text-danger" data-bs-custom-class="tooltip-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-circle" src="assets/image/user.svg" alt="Avtar image" width="33">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            Adam Baldwin
                                        </div>
                                    </div>
                                </td>
                                <td><i class="far fa-calendar me-1"></i>Jan 01, 2022</td>
                                <td>
                                    <span class="badge text-bg-blue-100 text-success">Incoming</span>
                                </td>
                                <td>
                                    <span class="text-success fw-semibold">+ $2,586.60</span>
                                </td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" class="text-info me-2" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-pen-alt"></i></a>
                                    <a href="javascript:void(0)" class="text-danger" data-bs-custom-class="tooltip-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- Chart col end -->
    
</div> --}}
<div class="card">
    <div class="card-header">
        Chart
    </div>
    <div class="card-body">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="toolbar">
                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                    </div>
                    <!-- <div id="chart"></div> -->
                    {!! $chart1->renderHtml() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{ asset('backend/common/js/chart.min.js') }}"></script>
{{-- {!! $chart1->renderChartJsLibrary() !!} --}}
{!! $chart1->renderJs() !!}
<script>
    // var orders_this_month = new Chart(ctx, {
    //     type: 'line',
    //     data: {
    //         labels: [
    //             "2022-06-23",
    //             "2022-06-24",
    //             "2022-06-25",
    //             "2022-06-26",
    //             "2022-06-27",
    //             "2022-06-28",
    //                 ],
    //     datasets: [
    //                     {
    //             label: 'Orders this month',
    //             data: [
    //                                         1,
    //                                         0,
    //                                         0,
    //                                         0,
    //                                         0,
    //                                         1,
    //                                 ],
    //                                                         fill: false,
    //                                                             borderColor: 'rgba(244, 8, 174, 0.2)',
    //                                                 borderWidth: 2
    //         },
    //                 ]
    // },
    // options: {
    //     tooltips: {
    //         mode: 'point'
    //     },
    //     height: '300px',
    //                 scales: {
    //             xAxes: [],
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero:true
    //                 }
    //             }]
    //         },
    //         }
    // });
    // const ctx = document.getElementById('myChart').getContext('2d');
    // const myChart = new Chart(ctx, {
    //     type: 'line',
    //     data: {
    //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    //         datasets: [{
    //             label: '# of Votes',
    //             data: [12, 19, 3, 5, 2, 3],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)',
    //                 'rgba(255, 159, 64, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });
</script>
@endpush


@endsection