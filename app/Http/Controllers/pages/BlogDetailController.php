<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogDetailController extends Controller
{
    function BlogDetail()
    {
        return view('pages.blog-detail');
    }
}
