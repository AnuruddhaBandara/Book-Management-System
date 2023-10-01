<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\StaffAuthController;
use App\Http\Controllers\ReaderAuthController;

class AuthController extends Controller
{
    public function loginDispatcher(Request $request)
    {
        $userType = $request->input('user_type');

        if ($userType === 'staff') {
            $staffAuthController = new StaffAuthController();
            return $staffAuthController->login($request);
        } elseif ($userType === 'reader') {
            $readerAuthController = new ReaderAuthController();
            return $readerAuthController->login($request);
        }

        return back()->withErrors([
            'user_type' => 'Invalid user type selected.',
        ]);
    }
}
