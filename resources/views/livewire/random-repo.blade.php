
<section class="flex place-content-center bg-gray-700 h-screen items-center">
    <div class="bg-white shadow-md rounded-lg p-6 h-auto w-96 items-center ">
        @if ($repository)
            <div class="border-b border-gray-200 pb-4 mb-4">
                <h5 class="text-2xl font-bold text-gray-800 ">{{ $repository['full_name'] }}</h5>
                <p class="text-gray-600 mt-2">{{ $repository['description'] }}</p>
                <p class="text-gray-600 mt-2"><strong>{{ $repository['language'] }}</strong></p>
                <div class="flex items-center mt-2 text-gray-700">

                    <span class="ml-2 text-gray-400">⭐ {{ $repository['stargazers_count'] }}</span>
                </div>
                <a href="{{ $repository['html_url'] }}" target="_blank" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ver en GitHub</a>
            </div>
        @else
            <p class="text-red-500">No se pudo obtener un repositorio. Inténtalo de nuevo.</p>
        @endif


        <button wire:click="getRandomRepository" class="mt-4 bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Obtener otro repositorio</button>

            <button wire:click="getPHPrepo" class="mt-4 bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800">PHP</button>
            <button wire:click="getJSrepo" class="mt-4 bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">JS</button>

    </div>
</section>
