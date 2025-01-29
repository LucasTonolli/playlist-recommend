<x-layout.header :title="$title" />

<!-- Home Section -->
<section class="min-h-screen bg-gray-900 text-white flex flex-col justify-center items-center relative overflow-hidden">
    <!-- Background Animation Container -->
    <div id="background-animation" class="inset-0 z-0"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4">
        <h1 class="text-5xl text-sm-2xl md:text-6xl font-bold mb-6 opacity-0 animate-fade-in ">
            Descubra novas recomendações
        </h1>
        <p class="text-lg md:text-xl mb-8 animate-fade-in opacity-0 animate-delay-1">
            Explore as melhores sugestões feitas especialmente para você.
        </p>
        <a
            href="{{ $playlist->spotify_web }}"
            target="_blank"
            class="bg-purple-900 opacity-0 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 animate-fade-in animate-delay-2"
        >
            Ver Recomendação
        </a>
    </div>
</section>


<x-layout.footer />
