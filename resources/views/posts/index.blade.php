<x-layout>
    <h2 class="title1">This is the latest posts</h2>
    @guest
    <h1 class="title1">Latest Posts daw ito sa guestlist</h1>
    @endguest
    
    @auth
    <h1 class="title1">Latest Posts daw ito sa Auth</h1>
    @endauth
</x-layout>