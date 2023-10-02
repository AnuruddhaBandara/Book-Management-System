@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-1/2">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="font-bold text-2xl mb-4">Login</div>

                <form action="{{ url('/login') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="user_type" class="block text-sm font-medium text-gray-600">User Type</label>
                        <select name="user_type" id="user_type" class="mt-1 p-2 w-full border rounded-md">
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">Viewer</option>
                            <option value="reader">Reader</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md" required>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md" required>

                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
