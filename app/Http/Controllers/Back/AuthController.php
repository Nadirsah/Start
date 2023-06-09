<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {

        return view('back.auth.login');
    }

    public function login(AuthRequest $request)
    {

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
if(auth()->user()->role=='director'){
    return redirect()->route('admin.dashboard');
}else if (auth()->user()->role=='menzil_sahibi'){
    return redirect()->route('admin.order.index');
}else{
    return redirect()->route('admin.login')->withErrors('Istifadeci adi ve ya parol sehfdi');
} 
        }

        
}

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}