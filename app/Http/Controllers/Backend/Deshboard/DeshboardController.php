<?php

namespace App\Http\Controllers\Backend\Deshboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeshboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index() {
        $this->data['deshboard_active'] = 'active';
        return view('backend.deshboard.deshboard', $this->data);
    }
}
