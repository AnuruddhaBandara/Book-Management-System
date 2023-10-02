@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-4">
    <h1 class="text-2xl font-semibold mb-4">Edit Book</h1>
    <form method="POST" action="{{ route('admin.books.update', ['id' => $books[0]['id']]) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-600">Title  </label>
            <input type="text" name="title" id="title" class="form-input w-full rounded-md border-gray-300" value="{{ $books[0]['title'] }}">
            @if ($errors->has('title'))
            <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
        @endif
        </div>

        <div class="mb-4">
            <label for="author" class="block text-gray-600">Author</label>
            <input type="text" name="author" id="author" class="form-input w-full rounded-md border-gray-300" value="{{ $books[0]['author'] }}">
            @if ($errors->has('author'))
            <span class="text-red-500 text-sm">{{ $errors->first('author') }}</span>
        @endif
        </div>

        <div class="mb-4">
            <label for="isbn" class="block text-gray-600">ISBN</label>
            <input type="number" name="isbn" id="isbn" class="form-input w-full rounded-md border-gray-300" value="{{ $books[0]['isbn'] }}">
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

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Update Book</button>
        </div>
    </form>
</div>
@endsection
