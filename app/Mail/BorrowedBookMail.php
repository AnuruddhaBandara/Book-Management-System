<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Borrow;

class BorrowedBookMail extends Mailable
{
    use Queueable, SerializesModels;

    public $borrow;
    public $readerName;
    public $bookTitle;
    public $borrowedDate;
    public $returnByDate;


    public function __construct($borrow)
    {
        $this->readerName = $borrow->user->name;
        $this->bookTitle = $borrow->book->title;
        $this->borrowedDate = $borrow->created_at;
        $this->returnByDate = $borrow->return_by;
    }

    public function build()
    {
        return $this->view('emails.borrowed_book');
    }
}
