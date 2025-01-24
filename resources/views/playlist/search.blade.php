<x-layout.header/>
   <div class="container">
   <h1>Playlists</h1>

    @foreach($playlists->items as $playlist)
       <x-playlist.card.horizontal :playlist="$playlist" />
   @endforeach
<x-layout.footer/>

