<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-8">
            <h2 class="text-2xl font-bold text-center text-blue-500 mb-6">Customer Registration</h2>

            @if(session('success'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-300 rounded-lg p-3">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 text-red-700 bg-red-100 border border-red-300 rounded-lg p-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('customer.register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                    <input type="password" name="password" id="password"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-300">
                    Register
                </button>
            </form>

            <p class="mt-4 text-sm text-center text-gray-600">
                Already have an account?
                <a href="{{ route('customer.login') }}" class="text-blue-500 hover:underline">Login here</a>.
            </p>
        </div>
    </div>
</body>
</html>
