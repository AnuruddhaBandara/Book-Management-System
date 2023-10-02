@extends('layouts.admin')

@section('content')
    <h1>Create New Book</h1>

    <div class="mt-2"> </div>

    <form action="{{ route('admin.books.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
        <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md" required>
        @if ($errors->has('title'))
            <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="mb-4">
        <label for="author" class="block text-sm font-medium text-gray-600">Author</label>
        <input type="text" name="author" id="author" class="mt-1 p-2 w-full border rounded-md" required>
        @if ($errors->has('author'))
            <span class="text-red-500 text-sm">{{ $errors->first('author') }}</span>
        @endif
    </div>

    <div class="mb-4">
        <label for="isbn" class="block text-sm font-medium text-gray-600">ISBN</label>
        <input type="number" name="isbn" id="isbn" class="mt-1 p-2 w-full border rounded-md" required>
        @if ($errors->has('isbn'))
            <span class="text-red-500 text-sm">{{ $errors->first('isbn') }}</span>
        @endif
    </div>

    <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-600">Status</label>
        <select name="status" id="status" class="mt-1 p-2 w-full border rounded-md">
            <option value="available">Available</option>
            <option value="borrowed">Borrowed</option>
        </select>
        @if ($errors->has('status'))
            <span class="text-red-500 text-sm">{{ $errors->first('status') }}</span>
        @endif
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create Book
    </button>
</form>

@endsection
