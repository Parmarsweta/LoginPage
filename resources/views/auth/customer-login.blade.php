<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-8">
            <h2 class="text-2xl font-bold text-center text-blue-500 mb-6">Customer Login</h2>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-300 rounded-lg p-3">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-4 text-red-700 bg-red-100 border border-red-300 rounded-lg p-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('customer.login') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" id="email"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                    <input type="password" name="password" id="password"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                        class="h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-blue-500">
                    <label for="remember" class="ml-2 text-sm text-gray-700">Remember Me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-300">
                    Login
                </button>
            </form>

            <!-- Registration Link -->
            <p class="mt-4 text-sm text-center text-gray-600">
                Don't have an account?
                <a href="{{ route('customer.register') }}" class="text-blue-500 hover:underline">Register here</a>.
            </p>
        </div>
    </div>
</body>
</html>
