<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header Section -->
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold">Customer Dashboard</h1>
            <form action="{{ route('customer.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition duration-300">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-semibold mb-6">Welcome, {{ Auth::guard('customer')->user()->name }}!</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Profile Card -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-medium mb-4">Your Profile</h3>
                <p><strong>Name:</strong> {{ Auth::guard('customer')->user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::guard('customer')->user()->email }}</p>
                <div class="mt-4">
                    <a href="#" class="text-blue-600 hover:underline">Edit Profile</a>
                </div>
            </div>

            <!-- Quick Links Card -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-medium mb-4">Quick Links</h3>
                <ul class="list-disc ml-5 space-y-2">
                    <li><a href="#" class="text-blue-600 hover:underline">Update Profile</a></li>
                    <li><a href="#" class="text-blue-600 hover:underline">View Orders</a></li>
                    <li><a href="#" class="text-blue-600 hover:underline">Support Tickets</a></li>
                </ul>
            </div>

            <!-- Notifications Card -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-medium mb-4">Notifications</h3>
                <p class="text-gray-500">No new notifications at the moment.</p>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} Customer Dashboard. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
\
