<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class MainNewsController extends Controller
{
    public function open()
{

    $freshNews = News::latest()->take(3)->get();

    return view('main', compact('freshNews'));
}
}
