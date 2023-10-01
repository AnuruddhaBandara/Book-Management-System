<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidation;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRegistered;
use App\Interface\ReaderRegistrationRepositoryInterface;



class ReaderRegistrationController extends Controller
{
    private $registerRepo;
    public function __construct(ReaderRegistrationRepositoryInterface $registerRepo){
        $this->registerRepo = $registerRepo;
    }
    public function showRegistrationForm()
    {
        return view('reader.register');
    }

    public function register(RegisterValidation $request)
    {
        $this->registerRepo->register($request);

        session()->flash('user_registered', 'A new reader has been registered.');
        return redirect()->route('login');
    }
}
