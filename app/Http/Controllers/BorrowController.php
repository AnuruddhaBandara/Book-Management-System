<?php

namespace App\Http\Controllers;

use App\Interface\BookingBorrowRepositoryInterface;
use App\Interface\BookingRepositoryInterface;
use App\Interface\ReaderRegistrationRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Reader;
use Illuminate\Support\Facades\Mail;
use App\Mail\BorrowedBookMail;
use Illuminate\Support\Facades\Auth;


class BorrowController extends Controller
{
    private $bookBorrowRepo;
    private $bookRepo;
    private $readerRepo;
    public function __construct(BookingBorrowRepositoryInterface $bookBorrowRepo, BookingRepositoryInterface $bookRepo, ReaderRegistrationRepositoryInterface $readerRepo)
    {
        $this->bookBorrowRepo = $bookBorrowRepo;
        $this->bookRepo = $bookRepo;
        $this->readerRepo = $readerRepo;
    }

    public function index()
    {
        $borrows = $this->bookBorrowRepo->getAllBookBorrows();
        return view('reader.borrows', ['borrows' => $borrows]);
    }

    public function create()
    {
        $borrows = $this->bookBorrowRepo->getAllBookBorrows();
        return view('reader.borrows', ['borrows' => $borrows]);
    }

    public function createBorrowRecord()
    {
        $loggedInUser = Auth::guard('staff')->user();
        if($loggedInUser->role == 'viewer' || !$loggedInUser->hasPermissionTo('assign books')){
            return redirect()->route('admin.dashboard')->with('error', 'You do not have permission to assign books.');

        }
        else{
            $books = $this->bookRepo->getAllBooks();
            $users =$this->readerRepo->getAllReaders();
            return view('admin.books.borrow_book', ['books' => $books, 'users' => $users]);
        }
    }

    public function store(Request $request)
    {
        $borrow = new Borrow([
            'book_id' => $request->book_id,
            'user_id' => $request->user_id,
            'borrowed_at' => now(),
            'return_by' => $request->return_by,
        ]);

        $borrow->save();

        $borrowed_book = Borrow::with(['book', 'user'])
               ->find($borrow->id);


        // Send Email to the Reader
        Mail::to(Reader::find($request->user_id)->email)->send(new BorrowedBookMail($borrowed_book));

        return redirect()->back();
    }
}
