<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function StudentArticles()
    {
        return view('dashboard.student.articles.index');
    }
}
