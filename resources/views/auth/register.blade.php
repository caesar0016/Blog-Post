<x-layout>
    <h1 class="title1">Register Account</h1>

    <div class="mx-auto max-w-screen-sm bg-slate-200 p-6 rounded-lg shadow-lg">
        <form action="{{route('register')}}" method="POST">
            @csrf

                {{-- username --}}
        <div class="mb-4">
            <label for="username" class="block text-lg font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username" value="{{old('username')}}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none 
            @error('username') ring-2 ring-red-500 @enderror">

            @error('username')
                <p class="text-red-700 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>



            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none
                @error('email') ring-2 ring-red-500 @enderror">
               
                @error('email')
                <p class="text-red-700 mt-1 text-sm">{{ $message }}</p>
                 @enderror
            </div>
            

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none
                @error('password') ring-2 ring-red-500 @enderror">
                
                @error('password')
                <p class="text-red-700 mt-1 text-sm">{{ $message }}</p>
                 @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-8">
                <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none 
                @error('password') ring-2 ring-red-500 @enderror">

                {{--this is the sample error message for the forms --}}
                @error('password')
                <p class="text-red-700 mt-1 text-sm">{{ $message }}</p>
                 @enderror
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
