<?php

namespace App\Repository;

use App\Interface\StaffRegisterationReposotoryInterface;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;


class StaffRegistrationRepository extends BaseRepository implements StaffRegisterationReposotoryInterface
{

    public function __construct(Staff $model)
    {
        parent::__construct($model);
    }

    public function register($request){
        $this->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->user_type,
            'user_type' => $request->user_type,
        ]);
    }
    public function allStaffMembers(){
       return $this->all();
    }
}
