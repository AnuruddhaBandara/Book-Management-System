<?php

namespace App\Repository;

use App\Interface\ReaderRegistrationRepositoryInterface;
use App\Models\Reader;
use Illuminate\Support\Facades\Hash;


class ReaderRegistrationRepository extends BaseRepository implements ReaderRegistrationRepositoryInterface
{

    public function __construct(Reader $model)
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
