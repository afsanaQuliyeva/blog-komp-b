<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{
    public function index() {
        $articles = Article::latest()->paginate(Article::PAGE_COUNT);
        return view('homepage', compact('articles'));
    }

    public function showDashboard() {
        return view('admin.dashboard');
    }

}
