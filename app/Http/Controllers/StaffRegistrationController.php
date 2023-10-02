<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidation;
use App\Interface\StaffRegisterationReposotoryInterface;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StaffRegistrationController extends Controller
{
    private $registerRepo;
    public function __construct(StaffRegisterationReposotoryInterface $registerRepo){
        $this->registerRepo = $registerRepo;
    }
    public function listStaff()
    {
        $loggedInUser = Auth::guard('staff')->user();
        if($loggedInUser->role != 'admin' || !$loggedInUser->hasPermissionTo('manage staff')){
            return redirect()->route('admin.dashboard')->with('error', 'You do not have permission to view this page.');
        }
        else{
            $users = $this->registerRepo->allStaffMembers();//Staff::all();
            return view('staff.index', ['users' => $users]);
        }
    }
    public function changeStatus(Request $request, $id)
    {
        $user = Staff::find($id);
        $user->status = $request->status;
        $user->save();
        return redirect()->back();
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
