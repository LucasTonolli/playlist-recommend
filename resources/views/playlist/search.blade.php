<x-layout.header :title="$title" />

<!-- Home Section -->
<section class="min-h-screen bg-gray-900 text-white flex flex-col justify-center items-center relative overflow-hidden">
    <!-- Background Animation Container -->


    <!-- Content -->
    <div class="container mx-auto z-10 text-center px-4 md:pt-[120px] pt-[80px] flex flex-col items-center">

        @if(!filter_input(INPUT_GET, 'term'))
        <h1 class="text-3xl text-sm-2xl md:text-6xl font-bold mb-6 opacity-0 animate-fade-in ">
            Adicionar novas playlists
        </h1>
        <form action="{{ route('spotify.search') }}" method="get" class="md:w-1/2 w-full">
            <input type="text" name="term" class="mt-1 mb-4 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
            text-black animate-fade-in opacity-0 animate-delay-1"
            placeholder="Digite aqui..."/>
            <button class="bg-purple-900 opacity-0 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 animate-fade-in animate-delay-2" type="submit">Buscar</button>
        </form>
        @else
            <h1 class="text-5xl text-sm-xl md:text-6xl font-bold mb-6 opacity-0 animate-fade-in ">
                    Resultados para: {{ filter_input(INPUT_GET, 'term') }}
            </h1>
             @if(session('success'))
                <x-alert type="success" message="{{session('success')}}" />
            @endif

            @if(session('error'))
                <x-alert type="error" message="{{session('error')}}" />
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6">

                @forelse ($playlists->items as $playlist)
                    <x-playlist.card.horizontal :playlist="$playlist" />
                @empty
                    <p class="text-gray-600">Nenhum resultado encontrado</p>
                @endforelse
            </div>

            <div class="flex gap-0 justify-center m-4">
                @if ($playlists->pagination->current_page == 1 || !request('page'))
                    <span class="px-3 py-1 bg-purple-500 text-white rounded-s-lg border-r border-solid  opacity-50 cursor-not-allowed">Anterior</span>
                @else
                    <a href="{{ route('spotify.search', ['term' => request('term'), 'page' => $playlists->pagination->current_page - 1])}}" class="px-3 py-1 bg-purple-500 border-r text-white rounded-s-lg  hover:bg-purple-700">Anterior</a>
                @endif

                @php
                    $totalPages = $playlists->pagination->page_qty;
                    $currentPage = $playlists->pagination->current_page;
                    $showAround = 2; // Exibir 2 páginas antes e 2 depois da página atual
                @endphp



                @for ($page = max(1, $currentPage - $showAround); $page <= min($totalPages, $currentPage + $showAround); $page++)
                    <a href="{{ route('spotify.search', ['term' => request('term'), 'page' => $page]) }}" class="px-3 py-1 {{ $page == $currentPage ? 'bg-purple-900 text-white' : 'bg-purple-500 text-white hover:bg-purple-700' }}">
                        {{ $page }}
                    </a>
                @endfor

                    <!-- Páginas Finais -->
                @if ($currentPage < $totalPages)
                    <a href="{{ route('spotify.search', ['term' => request('term'), 'page' => $totalPages]) }}" class="px-3 py-1 bg-purple-500 text-white">
                        {{ $totalPages }}
                    </a>
                @endif

                @if (!$playlists->pagination->is_last_page)
                    <a dir="rtl" href=" {{ route('spotify.search', ['term' => request('term'), 'page' => $playlists->pagination->current_page + 1])}}" class="px-3 py-1 bg-purple-500 border-e text-white rounded-s-lg hover:bg-purple-700">Próximo</a>
                @else
                    <span dir="rtl" class="px-3 py-1 bg-purple-500 text-white rounded-s-lg  border-e opacity-50 cursor-not-allowed">Próximo</span>
                @endif
            </div>
        @endif
    </div>
</section>


<x-layout.footer />
