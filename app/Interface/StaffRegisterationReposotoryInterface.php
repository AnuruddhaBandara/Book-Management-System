<?php
namespace App\Interface;

interface StaffRegisterationReposotoryInterface{
    public function register($request);
    public function allStaffMembers();
}
