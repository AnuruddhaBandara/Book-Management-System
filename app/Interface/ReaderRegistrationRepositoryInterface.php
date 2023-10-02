<?php
namespace App\Interface;

interface ReaderRegistrationRepositoryInterface{
    public function register($request);
    public function getAllReaders();
}
