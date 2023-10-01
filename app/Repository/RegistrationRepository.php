<?php

namespace App\Repository;

use App\Interface\RegisterationReposotoryInterface;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;


class RegistrationRepository extends BaseRepository implements RegisterationReposotoryInterface
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
        ]);
    }
}
