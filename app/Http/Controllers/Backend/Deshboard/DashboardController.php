<?php

namespace App\Http\Controllers\Backend\Deshboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $this->data['deshboard_active'] = 'active';
        return view('backend.dashboard.dashboard', $this->data);
    }
}
