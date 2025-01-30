<x-layout>
   
    
    <a href="{{ route('profile')}}" class="block mb-4 text-xl text-blue-500">&larr;Go back to profile page</a>

        {{-- This is the post form --}}
    <div class="mx-auto max-w-screen-sm bg-slate-200 p-6 rounded-lg shadow-lg">
        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')
            
            
            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title" class="block text-lg font-medium text-gray-700">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none 
                @error('title') ring-2 ring-red-500 @enderror">
                
                @error('title')
                <p class="text-red-700 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body" class="block text-lg font-medium text-gray-700">Post Content</label>
                <textarea name="body" rows="10" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 
                @error('body') ring-2 ring-red-500 @enderror">{{ $post->body }}</textarea>

                @error('body')
                    <p class="text-red-700 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none">Update</button>
            </div>
        </form>
    </div>
</x-layout>

