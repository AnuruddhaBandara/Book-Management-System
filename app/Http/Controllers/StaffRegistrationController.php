<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidation;
use App\Interface\StaffRegisterationReposotoryInterface;
use App\Models\Staff;
use Illuminate\Http\Request;


class StaffRegistrationController extends Controller
{
    private $registerRepo;
    public function __construct(StaffRegisterationReposotoryInterface $registerRepo){
        $this->registerRepo = $registerRepo;
    }
    public function listStaff()
    {
        $users = Staff::all();
        return view('staff.index', ['users' => $users]);
    }
    public function showRegistrationForm()
    {
        return view('staff.register');
    }

    public function register(RegisterValidation $request)
    {
        $this->registerRepo->register($request);
        session()->flash('user_registered', 'A new user has been registered.');

        return redirect()->route('login');
    }
}
