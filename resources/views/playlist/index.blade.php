<x-layout.header />
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Playlists</h1>

    <!-- Grid Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($playlists as $playlist)
            <x-playlist.card.horizontal :playlist="$playlist" />
            <x-playlist.card.horizontal :playlist="$playlist" />
        @endforeach
    </div>
</div>
<x-layout.footer />
