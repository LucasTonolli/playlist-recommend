<x-layout.header :title="$title" />

<!-- Home Section -->
<section class="min-h-screen bg-gray-900 text-white flex flex-col justify-center playlists-center relative overflow-hidden">
    <!-- Background Animation Container -->


    <!-- Content -->
    <div class="container mx-auto z-10 text-center px-4 pt-[120px] flex flex-col items-center">

        <h1 class="md:text-5xl text-3xl font-bold mb-6 opacity-0 animate-fade-in ">
            Playlists adicionadas
        </h1>
        <h2 class="font-bold mb-6 "> Mostrando {{ $playlists->firstItem() }} - {{ $playlists->lastItem() }} playlists de {{ $playlists->total() }} playlists</h2>

        <form action="{{ route('playlist.index') }}" method="get" class="md:w-1/2 w-full mb-2">
            <input type="text" name="term" class="mt-1 mb-4 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
            text-black"
            placeholder="Digite aqui..."
            value="{{ request('term')}}"/>
             <div class="grid grid-cols-2 gap-y-4 gap-x-6">
                <button class="bg-purple-900 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 " type="submit" >Buscar</button>
                <a href ="{{ route('playlist.index', request()->except('term', 'page')) }}" class="bg-purple-400 hover:bg-purple-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 ">Limpar</a>
            </div>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6">

            @forelse ($playlists as $playlist)
                <x-playlist.card.horizontal :playlist="$playlist" />
            @empty
                <p class="text-gray-600">Nenhum resultado encontrado</p>
            @endforelse
        </div>

       <div class="flex gap-0 justify-center m-4">
            @if ($playlists->onFirstPage())
                <span class="px-3 py-1 bg-purple-500 text-white rounded-s-lg border-r border-solid  opacity-50 cursor-not-allowed">Anterior</span>
            @else
                <a href="{{ $playlists->withQueryString()->previousPageUrl() }}" class="px-3 py-1 bg-purple-500 border-r text-white rounded-s-lg  hover:bg-purple-700">Anterior</a>
            @endif

            @foreach ($playlists->getUrlRange(1, $playlists->lastPage()) as $page => $url)
                <a href="{{ $url }}" class="px-3 py-1 border-white   {{ $page == $playlists->currentPage() ? 'bg-purple-900 text-white' : 'bg-purple-500 text-white hover:bg-purple-700' }}">
                    {{ $page }}
                </a>
            @endforeach

            @if ($playlists->hasMorePages())
                <a dir="rtl" href="{{ $playlists->withQueryString()->nextPageUrl() }}" class="px-3 py-1 bg-purple-500 border-e text-white rounded-s-lg hover:bg-purple-700">Próximo</a>
            @else
                <span dir="rtl" class="px-3 py-1 bg-purple-500 text-white rounded-s-lg  border-e opacity-50 cursor-not-allowed">Próximo</span>
            @endif
        </div>


    </div>
</section>
<x-layout.footer />
