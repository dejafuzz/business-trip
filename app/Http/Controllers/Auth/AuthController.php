<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\repositories\interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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

        $userCheck = $this->userRepository->findByUsername($request->input('username'));
        if ($userCheck == null) {
            return redirect()->back()->with('error', 'Akun tidak ditemukan.');
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
                    return redirect()->route('sdm.business.trip');
                default:
                    return redirect()->back()->with('error', 'Role tidak sesuai.');
            }
        }

        return redirect()->back()->with('error', 'Password salah!');
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }
}