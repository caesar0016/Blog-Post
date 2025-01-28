<x-layout>
    <h1 class="title1">Profile</h1>
    
    
    {{-- This is the post form --}}
    <div class="mx-auto max-w-screen-sm bg-slate-200 p-6 rounded-lg shadow-lg">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            
            {{-- Session Messages --}}
            @if (session('success'))
            
                <div>
                    {{-- bg-pink the customize bg. 
                    It can be customized by other color --}}
                    
                    <x-flashMsg msg="{{ session('success')}}" bg="bg-pink-400"/>
                </div>
            
            @endif
            
            
            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title" class="block text-lg font-medium text-gray-700">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none 
                @error('title') ring-2 ring-red-500 @enderror">
                
                @error('title')
                <p class="text-red-700 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body" class="block text-lg font-medium text-gray-700">Post Content</label>
                <textarea name="body" rows="10" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 
                @error('body') ring-2 ring-red-500 @enderror">{{ old('body') }}</textarea>

                @error('body')
                    <p class="text-red-700 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none">Create</button>
            </div>
        </form>
    </div>
</x-layout>
