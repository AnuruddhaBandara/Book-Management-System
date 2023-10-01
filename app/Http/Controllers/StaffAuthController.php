<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('staff')->attempt($credentials)) {
            if($request->user_type == 'staff'){
                $user = Staff::where('email', $request->email)->first();
                $user->assignRole('admin');
                return redirect()->intended('/admin/dashboard');
            }else{
                return redirect()->intended('/admin/dashboard');
            }
        }

    }

    public function logout()
    {
        Auth::guard('staff')->logout();
        return redirect('/login');
    }
}
