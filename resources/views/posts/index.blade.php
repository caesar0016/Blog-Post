<x-layout>
    <h1 class="text-3xl font-bold mb-6">Latest Posts lels</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
