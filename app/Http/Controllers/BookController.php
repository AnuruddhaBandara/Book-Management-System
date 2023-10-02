<?php

namespace App\Http\Controllers;
use App\Http\Requests\BookingRequest;
use App\Interface\BookingRepositoryInterface;
use App\Models\Book;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookRepo;
    public function __construct(BookingRepositoryInterface $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('staff')->user();
        if ($user == NUll || ($user && !$user->hasPermissionTo('view books'))) {
            // dd(2);
            return redirect()->route('admin.dashboard')->with('error', 'You do not have permission to view this page.');
        }else{
            $books = $this->bookRepo->getAllBooks();
            return view('admin.books.index', compact('books'))->with('success', 'Operation completed successfully.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::guard('staff')->user();
        if (!$user->hasPermissionTo('edit books')) {
            return redirect()->route('admin.dashboard')->with('error', 'You do not have permission to view this page.');
        }else{
            $books = $this->bookRepo->getAllBooks();
            return view('admin.books.create', compact('books'))->with('success', 'Operation completed successfully.');;
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $this->bookRepo->createBooks($request);

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $book = $this->bookRepo->booksFindById($id);

        $logged_in_user = Auth::guard('staff')->user();

        if (!$logged_in_user->hasPermissionTo('edit books')) {

            return redirect()->route('admin.dashboard')->with('error', 'You do not have permission to view this page.');
        }else{
            $books = $this->bookRepo->getAllBooks();

            return view('admin.books.index', compact('books'))->with('success', 'Operation completed successfully.');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingRequest $request, string $id)
    {
        $book = $this->bookRepo->booksFindById($id);

        if (!$book) {
            return back()->with('error', 'Book not found'); // Handle the case where the book is not found
        }
        $bookingArray = [
            "title" => $request->title,
            "author" => $request->author,
            "isbn" => $request->isbn,
            "status" => $request->status,
        ];
        $this->bookRepo->updateBooks($bookingArray,$id);
        return redirect()->route('admin.books.edit', ['id' => $id])->with('success', 'Book updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookRepo->deleteBook($id);
        return redirect()->route('admin.books.index');
    }
}
