<x-layout.header :title="$title" />

<!-- Home Section -->
<section class="min-h-screen bg-gray-900 text-white flex flex-col justify-center items-center relative overflow-hidden">
    <!-- Background Animation Container -->

    <!-- Content -->
    <div class="relative z-10 text-center px-4">
        <h1 class="text-2xl text-sm-2xl md:text-6xl font-bold mb-6 opacity-0 animate-fade-in ">
            Contato
        </h1>
        <div class="flex space-u-4 flex-col items-center">
            <!-- Instagram -->
            <a href="https://www.instagram.com/tonolli.dev/" target="_blank" class="text-white hover:text-purple-800">
                <i class="ri-instagram-line text-2xl"></i> tonolli.dev
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/lucas-tonolli/" target="_blank" class="text-white hover:text-purple-800">
                <i class="ri-linkedin-line text-2xl"></i> Lucas Tonolli
            </a>

            <!-- GitHub -->
            <a href="https://github.com/LucasTonolli" target="_blank" class="text-white hover:text-purple-800">
                <i class="ri-github-line text-2xl"></i> LucasTonolli
            </a>

            <!-- E-mail -->
            <a href="mailto:contato@lucas-tonolli.com.br" class="text-white hover:text-purple-800">
                <i class="ri-mail-line text-2xl"></i> contato@lucas-tonolli.com.br
            </a>
        </div>

    </div>
</section>


<x-layout.footer />
