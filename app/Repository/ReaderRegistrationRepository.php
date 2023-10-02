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
    public function getAllReaders(){
        return $this->all();
    }
    public function createBookBorrow($request){
        return $this->create([
            'book_id' => $request->book_id,
            'user_id' => $request->user_id,
            'borrowed_at' => now(),
            'return_by' => $request->return_by,

        ]);
    }
}
