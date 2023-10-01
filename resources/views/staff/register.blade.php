@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-1/2">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="font-bold text-2xl mb-4">Staff Registration</div>

                <form method="POST" action="{{ route('staff.register') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="user_type" class="block text font-medium text-gray-600">User Type</label>
                        <select name="user_type" class="mt-1 p-2 w-full">
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">Viewer</option>
                        </select>

                        @if ($errors->has('user_type'))
                            <span class="text-danger">{{ $errors->first('user_type') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                        <input id="name" type="text" class="mt-1 p-2 w-full rounded-md border" name="name" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                        <input id="email" type="email" class="mt-1 p-2 w-full rounded-md border" name="email" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                        <input id="password" type="password" class="mt-1 p-2 w-full rounded-md border" name="password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                        <input id="password-confirm" type="password" class="mt-1 p-2 w-full rounded-md border" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Check if the 'user_registered' session flash message exists
        @if (session('user_registered'))
            alert("{{ session('user_registered') }}");
        @endif
    });
</script>
