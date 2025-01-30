<x-layout>
    <h1 class="text-3xl font-bold mb-6">Latest Posts lels</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $item)
            <x-PostsCards :item="$item"/>
        @endforeach
    </div>
    {{-- Pagination Links --}}
    <div class="mt-4">
        {{$posts->links()}} <!-- Display pagination links -->
    </div>
</x-layout>
