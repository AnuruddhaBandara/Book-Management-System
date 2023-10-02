<?php
namespace App\Interface;

interface BookingRepositoryInterface{
    public function getAllBooks();
    public function createBooks($request);
    public function booksFindById($id);
    public function updateBooks($request, $id);
    public function deleteBook($id);

}
