@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Create Borrow Record</h1>

        <form action="{{ route('admin.book.borrow') }}" method="post">
            @csrf
            <div class="mb-8">
                <label class="text-xl text-gray-600 mt-1 p-2 w-full">Select Book <span class="text-red-500">*</span></label></br>
                <select name="book_id"  class="mt-1 p-2 w-full" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-8">
                <label class="text-xl  mt-1 p-2 w-full">Select User (Reader) <span class="text-red-500">*</span></label></br>
                <select name="user_id" class="mt-1 p-2 w-full" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-8">
                <label class="text-xl text-gray-600">Return By <span class="text-red-500">*</span></label></br>
                <input type="date" name="return_by" required class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Borrow Record
                </button>
            </div>
        </form>
    </div>
@endsection
