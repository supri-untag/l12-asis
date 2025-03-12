<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function lectureIndex()
    {
        $lectures = Lecture::all();
        return view('dashboard.admin.page.lecture.index', [
            "lectures" =>$lectures
        ]);
    }
}
