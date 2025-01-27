<x-layout>
    @guest
        <h1 class="title1">Latest Posts daw ito sa guestlist</h1>
        @endguest

        @auth
        <h1 class="title1">Latest Posts daw ito sa Auth</h1>
    @endauth
</x-layout>