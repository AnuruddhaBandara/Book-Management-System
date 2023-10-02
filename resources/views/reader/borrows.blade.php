@extends('layouts.reader')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Borrow List</h1>

        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Book ID</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">User ID</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Borrowed At</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Return By</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Returned At</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($borrows as $borrow)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">{{ $borrow->book_id }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $borrow->user_id }}</td>
                        <td class="text-left py-3 px-4">{{ $borrow->borrowed_at }}</td>
                        <td class="text-left py-3 px-4">{{ $borrow->return_by }}</td>
                        <td class="text-left py-3 px-4">{{ $borrow->returned_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
