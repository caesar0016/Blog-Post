<x-layout>
    <h1>Home kasi homeless daw</h1>

    @auth
        <h1 class="title1">Verified User</h1>
    @endauth

    @guest
        <h1 class="title1">THis is a guest account</h1>
    @endguest
</x-layout>