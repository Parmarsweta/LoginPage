<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800">Staff Dashboard</h1>
            <p class="text-gray-600 mt-4">Welcome, Staff!</p>
            <a href="{{ route('logout') }}" class="mt-6 inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Logout
            </a>
        </div>
    </div>
</body>
</html>
