<x-layout.header />

<!-- Home Section -->
<section class="min-h-screen bg-gray-900 text-white flex flex-col justify-center items-center relative overflow-hidden">
    <!-- Background Animation Container -->
    <div id="background-animation" class="inset-0 z-0"></div>

    <!-- Content -->
    <div class="relative z-10 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 opacity-0 animate-fade-in te">
            Descubra Novas Recomendações
        </h1>
        <p class="text-lg md:text-xl mb-8 animate-fade-in opacity-0 animate-delay-1">
            Explore as melhores sugestões feitas especialmente para você.
        </p>
        <button
            id="cta-button"
            class="bg-purple-900 opacity-0 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 animate-fade-in animate-delay-2"
        >
            Ver Recomendações
        </button>
    </div>
</section>

<x-layout.footer />
