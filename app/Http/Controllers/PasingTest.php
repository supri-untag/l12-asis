<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Quota;
use App\Models\Smt;
use App\Models\Student;
use App\Models\Thesis;
use Illuminate\Http\Request;

class PasingTest extends Controller
{
    public function index()
    {
        return [
            Quota::all(),
            Smt::all(),
            Student::all(),
            Lecture::all(),
            Thesis::all(),
            Thesis::where('student_id', '231003741011353')->first()->students,
            Lecture::where('nidn', '0614096602')->first()->promotors,
            Student::where('nim', '231003741011353')->first()->thesis,
            Thesis::where('student_id', '231003741011353')->first()->promotors,
            Thesis::where('student_id', '231003741011353')->first()->quotas,
            Smt::first()->quotas,
            Quota::first()->smts,
            Thesis::where('student_id', '231003741011353')->first()->leaders,
        ];
    }
}
