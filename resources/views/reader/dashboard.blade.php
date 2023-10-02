@extends('layouts.reader')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Reader Dashboard</h1>
    <!-- dashboard content here -->

    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex">
           <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Book List</div>
                <a href="{{ route('admin.books.index') }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Go to Book List</a>
                </div>
        </div>
    </div>


    <div class="max-w-md mx-auto bg-white rounded-xl mt-5 shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex">
           <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Borrow List</div>
                <a href="{{ route('reader.borrows') }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Go to Borrow List</a>
                </div>
        </div>
    </div>

@endsection

