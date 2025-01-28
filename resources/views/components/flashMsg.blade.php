{{-- bg-green-500 is the default value if no bg is selected --}}
@props(['msg', 'bg' => 'bg-green-500'])


{{-- $bg is the background color that can be customized in profile.blade.php --}}

<p class="text-sm font-medium text-white bg-green-500 px-3 py-rounded-md {{$bg}}">
    {{$msg}}
</p>