<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('backoffice.admin.login',['showMenu' => false]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->is_admin) {
                Redis::set('user_' . $user->id, json_encode([
                    'name'  => $user->name,
                    'email' => $user->email,
                    'image' => $user->image,
                    'role'  => $user->role,
                    'isAdmin'  => $user->is_admin,
                ]), 'EX', 3600);
                return redirect()->route('backoffice.dashboard');
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Rol tanımı doğru değil!']);
        }

        return back()->withErrors(['email' => 'Geçersiz kimlik bilgileri.']);
    }
    public function forgotPassword()
    {
        echo 'test';
    }
}
