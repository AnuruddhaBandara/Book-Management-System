<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidation;
use App\Interface\RegisterationReposotoryInterface;
use App\Models\Staff;
use Illuminate\Http\Request;


class StaffRegistrationController extends Controller
{
    private $registerRepo;
    public function __construct(RegisterationReposotoryInterface $registerRepo){
        $this->registerRepo = $registerRepo;
    }
    public function showRegistrationForm()
    {
        return view('staff.register');
    }

    public function register(RegisterValidation $request)
    {
        $this->registerRepo->register($request);

        return redirect()->route('login');
    }
}
