<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{
    public function index() {
        return view('homepage');
    }

    public function showDashboard() {
        return view('admin.dashboard');
    }

}
