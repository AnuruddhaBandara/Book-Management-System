<?php
namespace App\Interface;

interface BookingBorrowRepositoryInterface{
    public function getAllBookBorrows();
    public function createBookBorrows($request);

}
