<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function signIn()
    {
        return view('auth.sign-in');
    }

    public function signInProses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $userRequest = collect($validator->validated());

        if ($validator->fails()){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 4,
                "message" => 'Ada kesalahan, tolong periksa ulang',
            ];
        }

        if (Auth::attempt([
            "email" => $userRequest->get('email'),
            "password" => $userRequest->get('password'),
        ])){
            $request->session()->regenerate();
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 0,
                "message" => 'Login berhasil, Selamat datang ' . collect(User::where('email',$userRequest->get('email'))->get()->first())->get('name'),
            ];
        }
        return [
            "status" => 200,
            "success" => true,
            "error_code" => 1,
            "message" => 'Login gagal, coba Lagi',
        ];
    }

    public function signUp()
    {
        return view('auth.sign-up');
    }

    public function signOut(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function signUpProses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:users,nim',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 4,
                "message" => 'Ada kesalahan, tolong periksa ulang',
            ];
        }

        $student = collect( Student::where('nim', $request->input('nim'))->get());
        if ($student->isEmpty()){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 1,
                "message" => 'Periksa ulang NPM anda.',
            ];
        }
        try {
            $userToStd = collect($validator->validated());
            User::create([
                'name' => $student->first()->name,
                'email' => $userToStd->get('email'),
                'email_verified_at' => now(),
                'password' => Hash::make($userToStd->get('password')),
                'role' => 'student',
                'nim' => $userToStd->get( 'nim'),
                'remember_token' => Str::random(20),
            ]);
            Student::where('nim', $userToStd->get( 'nim'))->update(["email"=>$userToStd->get('email')]);
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 0,
                "message" => 'Registrasi berhasil, silahkan masuk ' . $student->first()->name,
            ];
        }catch (\Exception $exception){
            return [
                "status" => 200,
                "success" => true,
                "error_code" => 4,
                "message" => 'Ada kesalahan, terdapat kekeliruan di sistem',
            ];
        }
    }
}
