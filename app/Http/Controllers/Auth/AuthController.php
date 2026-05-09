<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function actionLogin(Request $request) {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Session::flash('username', $request->input('username'));

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            switch ($user->role_id) {
                case 1:
                    return redirect()->route('admin.dashboard');
                case 2:
                    return redirect()->route('employee.business.trips');
                case 3:
                    return redirect()->route('sdm.cities');
                default:
                    return redirect()->back()->with('error', 'Role tidak sesuai.');
            }
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }
}