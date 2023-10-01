<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Dashboard</title>
    <!-- Add Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white p-4">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <a class="text-lg font-semibold text-gray-900" href="#">Staff Dashboard</a>
                <div class="space-x-4">
                    <a class="text-gray-600 hover:text-gray-900" href="{{ route('admin.dashboard') }}">Home</a>
                    {{-- <a class="text-gray-600 hover:text-gray-900" href="{{ route('admin.books.index') }}">Books</a> --}}
                    {{-- <a class="text-gray-600 hover:text-gray-900" href="{{ route('staff.index') }}">Staff</a> --}}
                    <a class="text-gray-600 hover:text-gray-900" href="{{ route('staff.logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

</body>
</html>
