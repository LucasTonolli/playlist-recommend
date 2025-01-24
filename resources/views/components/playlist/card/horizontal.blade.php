<div class="mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-3">
  <div class="flex flex-row">
    <div class="w-5/12">
      <img src="{{ $playlist->image_url}}" alt="Imagem do card" class="w-full h-auto object-cover">
    </div>

    <!-- Conteúdo -->
    <div class="w-7/12 p-4 flex flex-col justify-between relative">
            @if(!$playlist->id)
            <form action="{{ route('playlist.store')}}" method="post" class="absolute add-playlist">
                @csrf
                <input type="hidden" name="name" value="{{$playlist->name}}">
                <input type="hidden" name="image_url" value="{{$playlist->image_url}}">
                <input type="hidden" name="music_quantity" value="{{$playlist->music_quantity}}">
                <input type="hidden" name="spotify_id" value="{{$playlist->spotify_id}}">
                <button type="submit" class="inline-block px-4 md:text-2xl sm:text-lg text-black hover:text-[#0d6e30] transition duration-300"><i class="ri-add-circle-line"></i></button>
            </form>
            @endif

      <h2 class="md:text-xl sm:text-sm font-semibold text-gray-800">{{$playlist->name}}</h2>
      <p class="text-sm text-gray-600">Total de músicas: {{ $playlist->music_quantity}}</p>

      <!-- Botões -->
      <div class="flex space-x-4 mt-4 justify-between">
        <a href="{{ $playlist->spotify_web}}" target="_blank" class="inline-block px-4 py-2 bg-[#1ED760] text-white rounded hover:bg-[#0d6e30] transition duration-300">
             <i class="ri-spotify-fill"></i> Web
        </a>
         <a href="{{ $playlist->spotify_app}}" target="_blank" class="inline-block px-4 py-2 bg-[#1ED760] text-white rounded hover:bg-[#0d6e30] transition duration-300">
           <i class="ri-spotify-fill"></i> App
        </a>
      </div>
    </div>
  </div>
</div>
