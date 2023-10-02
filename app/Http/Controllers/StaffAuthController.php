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
        $userType = $request['user_type'];

        if (Auth::guard('staff')->attempt($credentials)) {
            $user = Staff::where('email', $request->email)->first();
            $user->assignRole('admin');
            // Assign role based on user_type
            switch ($userType) {
                case 'admin':
                    $user->assignRole('admin');
                    break;
                case 'editor':
                    $user->assignRole('editor');
                    break;
                case 'viewer':
                    $user->assignRole('viewer');
                    break;
                default:
                    // Default role if user_type doesn't match any case
                    $user->assignRole('guest');
                    break;
            }
            return redirect()->intended('/admin/dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout()
    {
        Auth::guard('staff')->logout();
        return redirect('/login');
    }
}
