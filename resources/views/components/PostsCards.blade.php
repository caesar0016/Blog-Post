@props(['item', 'full' => false])
<div class="card1">

    {{-- This is the Image --}}

    <div>
        @if ($item->image)

           <img src="{{ asset('storage/' . $item->image )}}" 
           alt=" -- Cover Photo --">
            
        @else

            <img src="{{ asset('storage/cover_pictures/default.jpg') }}" 
            alt="-- Cover Photo --">

        @endif
    </div>
                
    {{-- Title --}}
    <div class="mb-4">
        <h3 class="text-xl font-semibold text-gray-800">{{ $item->title }}</h3>
    </div>
    
    {{-- Posted at --}}
    <div class="text-sm text-gray-500 mb-4">
        <span class="italic">Posted by <a href="#" class="text-black-500 hover:underline font-bold">{{ $item->user->username }}</a> at</span> {{ $item->created_at->diffForHumans() }}
    </div>
    
    {{-- Body --}}
    @if ($full)

        <div class="text-gray-600">
            {{-- Thoe body, 15 is cut the card when 15 word --}}
            <span>{{ ($item->body ) }}</span>
        </div>
        
    @else

        <div class="text-gray-600">
            {{-- Thoe body, 15 is cut the card when 15 word --}}
            <span>{{ Str::words($item->body, 15) }}</span>
            <a href="{{ route('posts.show', $item)}}" class="text-blue-700 ml-2">See more</a>
        </div>

    @endif

    <div class="flex items-center justify-end gap-4 mt-6">

        {{$slot}}

    </div>
</div>