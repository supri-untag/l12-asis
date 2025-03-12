<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Quota;
use App\Models\Smt;
use App\Models\Student;
use App\Models\Thesis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasingTest extends Controller
{
    public function index()
    {
//        $quotas = Quota::where('smt_id', '01957e9a-8d5e-7287-a01d-a670bfd5ebb2')->where('nidn','0609026301');
//        $quotas->update([
//            "quota_at_smt" => 2
//        ]);
//        $valQuotasmt =  $quotas->get()->first()->quota_at_smt + 1;

        foreach ( Thesis::where('id', '01958392-f666-72ab-8489-f357774cb15f')->with(['promotors', 'students', 'quotas'])->get() as $item){
            $data = $item;
        }
        $quotaselac = Quota::where('smt_id', $data->quotas->smt_id)->where('nidn', '0614096602')->get('quota_at_smt');
        foreach ($quotaselac as $item) {
            $data2 = $item;
        }
        return [
//            Quota::all(),
//            Smt::all(),
//            Student::all(),
//            Lecture::all(),
//            Thesis::all(),
//            Thesis::where('student_id', '231003741011353')->first()->students,
//            Lecture::where('nidn', '0614096602')->first()->promotors,
//            Student::where('nim', '231003741011353')->first()->thesis,
//            Thesis::where('student_id', '231003741011353')->first()->promotors,
//            Thesis::where('student_id', '231003741011353')->first()->quotas,
//            Smt::first()->quotas,
//            Quota::first()->smts,
//            Thesis::where('student_id', '231003741011353')->first()->leaders,
//            User::where('nim', Auth::user()->nim)->first()->student,
//            Thesis::where('student_id', '231003741011353')->first()->users,
//            collect(User::where('email','imron@mail.com')->get()->first())->get('name'),
//            User::all()
//            Quota::where('smt_id', '01957e9a-8d5e-7287-a01d-a670bfd5ebb2')->where('nidn','0609026301')->get()
//            $quotas->get()->first()->quota_at_smt,
//            $valQuotasmt,
//            Thesis::with('students')->get()
            $data->quotas->id,
            $data->quotas,
            $data2->quota_at_smt


        ];
    }
}
