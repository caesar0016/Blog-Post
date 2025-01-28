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
    <h1 class="title2 mt-4">Your latest Posts</h1>
    <div class="grid grid-cols-2 gap-6 mt-4">
        @foreach ($posts as $item)
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                {{-- Title --}}
                <div class="mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $item->title }}</h3>
                </div>
                
                {{-- Posted at --}}
                <div class="text-sm text-gray-500 mb-4">
                    <span class="italic">Posted by <a href="#" class="text-black-500 hover:underline font-bold">Username</a> at</span> {{ $item->created_at->diffForHumans() }}
                </div>
                
                {{-- Body --}}
                <div class="text-gray-600">
                    {{-- Thoe body, 15 is cut the card when 15 word --}}
                    <p>{{ Str::words($item->body, 15) }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination Links --}}
    
    <div class="mt-4">
        {{$posts->links()}} <!-- Display pagination links -->
    </div>
</x-layout>
