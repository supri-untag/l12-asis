<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Quota;
use App\Models\Smt;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mockery\Exception;

class GoPromiseController extends Controller
{
    public function StudentGoPromise()
    {
        $dataCOllection = collect(Thesis::where('student_id', Auth::user()->nim)->get());
           return view('dashboard.student.go_promise.index', [
               "thesis" => $dataCOllection,
               "hasThesis" => $dataCOllection->isNotEmpty(),
               "lectures" => Lecture::all(),
               "idSmtNow" => collect(Smt::where('now', true)->get())->first()->id
           ]);
    }

    public function StudentGoPromiseAdd(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'h_name' => 'required',
            'h_nim' => 'required|unique:theses,student_id',
            'promotor' => 'required',
            'title_promise' => 'required',
            'das_sein' => 'required',
            'das_sollen' => 'required',
            'gaps' => 'required',
            'formulation' => 'required',
        ]);

        if ($validator->fails()){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 1,
                "message" => 'Ada kesalahan, tolong periksa ulang',
            ];
        }
        $idSmtNow = collect(Smt::where('now', true)->get());
        $nim_user = collect(Auth::user()->nim);
        $validatedData = collect($validator->validated());
        $quotas = Quota::where('smt_id', $idSmtNow->first()->id)->where('nidn',$validatedData->get('promotor'));

        if ($quotas->get()->isEmpty()){
            try {
                Quota::create([
                    "smt" => $idSmtNow->first()->smt,
                    "max" => collect(Quota::all()->first()->get('max'))->first()->max,
                    "nidn" => $validatedData->get('promotor'),
                    "quota_at_smt" => 1,
                    "smt_id" => $idSmtNow->first()->id,
                ]);

                Thesis::create([
                    'title_final'=> $validatedData->get('title_promise'),
                    'smt'=> $idSmtNow->first()->smt,
                    'year'=> $idSmtNow->first()->year,
                    'das_sein'=> $validatedData->get('das_sein'),
                    'das_sollen'=> $validatedData->get('das_sollen'),
                    'gaps'=> $validatedData->get('gaps'),
                    'formulation'=> $validatedData->get('formulation'),
                    'title_promise'=> $validatedData->get('title_promise'),
                    'title_proposal'=> $validatedData->get('title_promise'),
                    'title_shp'=> $validatedData->get('title_promise'),
                    'title_thesis'=> $validatedData->get('title_promise'),
                    'status_promise'=> '1',
                    'status_proposal'=> '0',
                    'status_shp'=> '0',
                    'status_thesis'=> '0',
                    'disabled_promise'=> '1',
                    'disabled_proposal'=> '0',
                    'disabled_shp'=> '0',
                    'disabled_thesis'=> '0',
                    'student_id'=> $nim_user->first(),
                    'leader'=> null,
                    'promotor'=> $validatedData->get('promotor'),
                    'method'=> null,
                    'moderator'=> null,
                ]);

                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 0,
                    "message" => 'Ajuan Judul berhasil dengan ' . $validatedData->get('title_promise'),
                ];
            }catch (\Exception $exception){
                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 1,
                    "message" => 'Ada kesalahan, tolong periksa ulang',
                ];
            }
        }else {
            if ( $quotas->get('quota_at_smt') >= $quotas->get('max')){
                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 2,
                    "message" => 'Dosen Pembimbing yang anda tunjuk sudah melebihi Kuota',
                ];
            }
            try {
                $valQuotasmt =  $quotas->get()->first()->quota_at_smt + 1;

                $quotas->update([
                    "quota_at_smt" => $valQuotasmt
                ]);

                Thesis::create([
                    'title_final'=> $validatedData->get('title_promise'),
                    'smt'=> $idSmtNow->first()->smt,
                    'year'=> $idSmtNow->first()->year,
                    'das_sein'=> $validatedData->get('das_sein'),
                    'das_sollen'=> $validatedData->get('das_sollen'),
                    'gaps'=> $validatedData->get('gaps'),
                    'formulation'=> $validatedData->get('formulation'),
                    'title_promise'=> $validatedData->get('title_promise'),
                    'title_proposal'=> $validatedData->get('title_promise'),
                    'title_shp'=> $validatedData->get('title_promise'),
                    'title_thesis'=> $validatedData->get('title_promise'),
                    'status_promise'=> '1',
                    'status_proposal'=> '0',
                    'status_shp'=> '0',
                    'status_thesis'=> '0',
                    'disabled_promise'=> '1',
                    'disabled_proposal'=> '0',
                    'disabled_shp'=> '0',
                    'disabled_thesis'=> '0',
                    'student_id'=> $nim_user->first(),
                    'leader'=> null,
                    'promotor'=> $validatedData->get('promotor'),
                    'method'=> null,
                    'moderator'=> null,
                ]);

                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 0,
                    "message" => 'Ajuan Judul berhasil dengan ' . $validatedData->get('title_promise'),
                ];
            } catch (\Exception $exception){
                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 1,
                    "message" => $exception,
                ];
            }
        }
    }

    public function AdminGoPromise()
    {
        $thesis = Thesis::with(['promotors','students'])->get();
        return view('dashboard.admin.page.go_promise.index', [
            "thesis" => $thesis,
            "lectures" => Lecture::all(),
            "idSmtNow" => collect(Smt::where('now', true)->get())->first()->id,
        ]);
    }

    public function AdminGoPromiseGetByID(Request $request)
    {
        try {
            foreach (Thesis::where('id', $request->input('id'))->with(['promotors','students'])->get() as $item){
                $data  = $item;
            }
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 0,
                "message" => 'Berhasil Mendapat data',
                "data" => $data

            ];
        }catch (\Exception $exception){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 1,
                "message" => 'Ada kesalahan, tolong hubungi Admin',
            ];
        }
    }

    public function AdminGoPromiseAccept(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 1,
                "message" => 'Ada kesalahan, tolong periksa ulang',
            ];
        }
        $validatedData = collect($validator->validated());

        try {
            Thesis::where('id', $validatedData->get('id') )->update([
                "status_promise" => "4"
            ]);
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 0,
                "message" => 'Ajuan judul diterima',

            ];
        } catch (\Exception $exception){

            return [
                "status" => 200,
                "success" => true,
                "error_code" => 1,
                "message" => 'Ada kesalahan, tolong hubungi Admin',
            ];

        }
    }

    public function AdminGoPromiseRevision(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'h_name' => 'required',
            'promotor' => 'required',
            'h_promotor' => 'required',
            'title_promise' => 'required',
            'das_sein' => 'required',
            'das_sollen' => 'required',
            'gaps' => 'required',
            'formulation' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 1,
                "message" => 'Ada kesalahan, tolong periksa ulang',
            ];
        }
        $validatedData = collect($validator->validated());
        if ($validatedData->get('h_promotor') == $validatedData->get('promotor')){
            try {
                Thesis::where('id', $validatedData->get('id'))->update([
                    "disabled_promise" => "0",
                    "status_promise" => "3",
                    "title_promise" => $validatedData->get('title_promise'),
                    "das_sein" => $validatedData->get('das_sein'),
                    "das_sollen" => $validatedData->get('das_sollen'),
                    "gaps" => $validatedData->get('gaps'),
                    "formulation" => $validatedData->get('formulation'),
                ]);
                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 0,
                    "message" => 'Ajuan judul berhasil di revisi',

                ];
            } catch (\Exception $exception){
                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 1,
                    "message" => 'Ada kesalahan, tolong hubungi Admin',
                ];
            }
        }
        $thesis = Thesis::where('id', $validatedData->get('id'))->with(['promotors', 'students', 'quotas'])->get();
        $quotas = Quota::where('smt_id', collect(collect($thesis)->first()->quotas->smt_id)->first())->where('nidn',$validatedData->get('promotor'));


        if (collect($quotas->get())->isEmpty()){
            try {
                Quota::create([
                    "smt" => collect(collect($thesis)->first()->quotas->smt)->first(),
                    "max" => collect(Quota::all()->first()->get('max'))->first()->max,
                    "nidn" => $validatedData->get('promotor'),
                    "quota_at_smt" => 1,
                    "smt_id" => collect(collect($thesis)->first()->quotas->smt_id)->first(),
                ]);
                Thesis::where('id', $validatedData->get('id'))->update([
                    "disabled_promise" => "0",
                    "status_promise" => "3",
                    "title_promise" => $validatedData->get('title_promise'),
                    "promotor" => $validatedData->get('promotor'),
                    "das_sein" => $validatedData->get('das_sein'),
                    "das_sollen" => $validatedData->get('das_sollen'),
                    "gaps" => $validatedData->get('gaps'),
                    "formulation" => $validatedData->get('formulation'),
                ]);
            }catch (\Exception $exception){
                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 1,
                    "message" => 'Ada kesalahan, tolong hubungi Admin',
                ];
            }
        }

        try {
            if ( $quotas->get('quota_at_smt') >= $quotas->get('max')){
                return [
                    "status" => 200,
                    "success" => true,
                    "error_code" => 2,
                    "message" => 'Dosen Pembimbing yang anda tunjuk sudah melebihi Kuota',
                ];
            }
            $quota_at_smt_new_promotor = collect($quotas->get())->first()->quota_at_smt + 1;
            $quotas->update([
                "quota_at_smt" => $quota_at_smt_new_promotor,
            ]);
            $quota_at_smt = collect(collect($thesis)->first()->quotas->quota_at_smt)->first() - 1;
            Quota::where('id', collect(collect($thesis)->first()->quotas->id)->first())->update([
                "quota_at_smt" => $quota_at_smt
            ]);
            Thesis::where('id', $validatedData->get('id'))->update([
                "disabled_promise" => "0",
                "status_promise" => "3",
                "title_promise" => $validatedData->get('title_promise'),
                "promotor" => $validatedData->get('promotor'),
                "das_sein" => $validatedData->get('das_sein'),
                "das_sollen" => $validatedData->get('das_sollen'),
                "gaps" => $validatedData->get('gaps'),
                "formulation" => $validatedData->get('formulation'),
            ]);
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 0,
                "message" => 'Ajuan judul berhasil di revisi',

            ];
        }catch (\Exception $exception){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 1,
                "message" => 'Ada kesalahan, tolong hubungi Admin',
            ];
        }
    }
}
