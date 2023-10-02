<?php

namespace App\Repository;

use App\Interface\BookingRepositoryInterface;
use App\Models\Book;


class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{

    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function getAllBooks(){
        return $this->all();

    }
    public function createBooks($request){
        return $this->create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'status' => 'available'

        ]);
    }
    public function booksFindById($id){
        return $this->find($id);
    }
    public function updateBooks($request,$id){
        return $this->update($request,1);

    }
    public function deleteBook($id){
        return $this->delete($id);
    }
}
