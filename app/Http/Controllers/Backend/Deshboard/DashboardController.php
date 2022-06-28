<?php

namespace App\Http\Controllers\Backend\Deshboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index() {
        $this->data['total_user'] = User::count();
        $this->data['total_order'] = Order::sum('total');
        $this->data['today_order'] = Order::whereDate('created_at', '>=', Carbon::now())->sum('total');
        $this->data['total_product'] = Product::count();

        $chart_options = [
            'chart_title'           => 'Orders this month',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Order',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'total',
            'filter_days'           => '30',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'translation_key'       => 'user',
            'continuous_time'       => true,
        ];

        $this->data['chart1'] = new LaravelChart($chart_options);

        return view('backend.dashboard.dashboard', $this->data);
    }
}
