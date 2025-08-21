<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(AuthRequest $request){
        try {
            $credentials = $request->validated();

            if (Auth::attempt($credentials)) {
                session()->regenerate();
                return redirect()->intended(route('home'));
            } else{
                throw new Exception('Invalid Credentials');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request){
        Auth::logout();
         $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
