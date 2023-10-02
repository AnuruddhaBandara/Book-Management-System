<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'status'
        // add other attributes you want to make fillable
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
