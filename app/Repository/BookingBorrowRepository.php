<?php

namespace App\Repository;

use App\Interface\BookingBorrowRepositoryInterface;
use App\Models\Borrow;


class BookingBorrowRepository extends BaseRepository implements BookingBorrowRepositoryInterface
{

    public function __construct(Borrow $model)
    {
        parent::__construct($model);
    }

    public function getAllBookBorrows(){
        return $this->all();

    }
    public function createBookBorrows($request){
        $data = $this->create([
            'book_id' => $request->book_id,
            'user_id' => $request->user_id,
            'borrowed_at' => now(),
            'return_by' => $request->return_by,

        ]);
        return $data;//response()->json(array('success' => true, 'last_insert_id' => $data->id), 200);
    }
}
