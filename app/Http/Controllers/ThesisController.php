<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThesisController extends Controller
{
    public function thesisIndex()
    {
        return view('dashboard.admin.page.thesis.index');
    }
}
