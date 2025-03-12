<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Smt;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoProposalController extends Controller
{
    public function StudentGoProposal()
    {
        $dataCOllection = collect(Thesis::where('student_id', Auth::user()->nim)->get());
        return view('dashboard.student.go_proposal.index', [
            "thesis" => $dataCOllection,
            "lectures" => Lecture::all(),
            "hasThesis" => $dataCOllection->isNotEmpty(),
            "idSmtNow" => collect(Smt::where('now', true)->get())->first()->id
        ]);
    }

    public function AdminGoProposal()
    {
        return view('dashboard.admin.page.go_proposal.index');
    }
}
