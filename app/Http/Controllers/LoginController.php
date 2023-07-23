<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {

        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function attempt(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $email = $credentials['email'];
        $password = $credentials['password'];

        $user = User::where('email', '=', $email)->first();
        if ($user === null) {
            return redirect('/login')->withErrors([
                'auth'=>'Email or password is not found']);
        }

        Auth::attempt([
            'email'=> $email,
            'password' => $password
        ]);
        
        
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        }else{
            return redirect('/')->with('failed', 'Login Gagal, Cek email dan password anda');
        }
    }

    public function regis()
    {
        return view('auth.registrasi', [
            'title' => 'Registrasi',
            'active' => 'Registrasi'
        ]);
    }

    public function create_regis(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'max:100'],
            'level' => ['required', 'max:100'],
            'email' => ['required', 'email:rfc,dns'],
            'nohp' => ['required', 'max:16'],
            'password' => ['required', 'min:6','max:100']
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/')->with('success', 'Registration successfull! Please login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/')->with('logout', 'Logout Berhasil');
    }
}
