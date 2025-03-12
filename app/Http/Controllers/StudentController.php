<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function Index()
    {
        return view('dashboard.student.index');
    }

    public function studentIndexDash()
    {
        $students = collect(Student::all());
        return view('dashboard.admin.page.student.index', [
            "students" => $students
        ]);
    }
}
