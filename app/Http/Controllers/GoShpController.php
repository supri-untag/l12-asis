<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Smt;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoShpController extends Controller
{
    public function StudentGoSHP()
    {
        $dataCOllection = collect(Thesis::where('student_id', Auth::user()->nim)->get());
        return view('dashboard.student.go_shp.index', [
            "thesis" => $dataCOllection,
            "lectures" => Lecture::all(),
            "hasThesis" => $dataCOllection->isNotEmpty(),
            "idSmtNow" => collect(Smt::where('now', true)->get())->first()->id
        ]);
    }

    public function AdminGoShp()
    {
        return view('dashboard.admin.page.go_shp.index');
    }
}
