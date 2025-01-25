<x-layout>
    <h1 class="title1">Register Account</h1>

    <div class="mx-auto max-w-screen-sm bg-red-100 p-6 rounded-lg shadow-lg">
        <form action="" method="POST">
            
            {{-- username --}}
            <div class="mb-4">
                <label for="username" class="block text-lg font-medium text-gray-700">Username</label>
                <input type="text" name="username" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input type="text" name="email" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
            

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            {{-- Confirm Password --}}
            <div class="mb-8">
                <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <!-- Register Button -->
            <div class="mb-4">
                <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Register
                </button>
            </div>

        </form>
    </div>
</x-layout>
