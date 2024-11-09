
<section class="flex place-content-center bg-gray-700 h-screen items-center">
    <div class="bg-white shadow-md rounded-lg p-6 h-auto w-min-96 w-auto  ">
        @if ($repository)
            <div class="border-b border-gray-200 pb-4 mb-4">
                <h5 class="text-2xl font-bold text-gray-800 ">{{ $repository['full_name'] }}</h5>
                <p class="text-gray-600 my-2">{{ $repository['description'] }}</p>
                <img class="rounded-full w-12" src="{{$repository['owner']['avatar_url']}}">
                <p class="text-gray-600 mt-2"><strong>{{ $repository['owner']['login'] }}</strong></p>

                <p class="text-gray-400 mt-2"><strong>{{ $repository['language'] }}</strong></p>

                <div class="flex items-center mt-2 text-gray-700">

                    <span class="text-gray-400">⭐ {{ $repository['stargazers_count'] }}</span>
                </div>
                <a href="{{ $repository['html_url'] }}" target="_blank" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ver en GitHub</a>
            </div>
        @else
            <p class="text-red-500">No se pudo obtener un repositorio. Inténtalo de nuevo.</p>
        @endif

        <select wire:model.live="language" class="shadow-2xl border-2 rounded mt-4   py-2 px-4">
            <option value="php" id="php">PHP</option>
            <option value="JavaScript" id="JavaScript">JavaScript</option>
            <option value="Python" id="Python">Python</option>
            <option value="c#" id="csharp">C#</option>
            <option value="Ruby" id="ruby">Ruby</option>
            <option value="java" id="java">Java</option>
            <option value="c" id="c">C</option>
            <option value="c++" id="cplusplus">C++</option>
            <option value="swift" id="swift">Swift</option>
            <option value="typescript" id="typescript">TypeScript</option>
            <option value="go" id="go">Go</option>
            <option value="kotlin" id="kotlin">Kotlin</option>
            <option value="rust" id="rust">Rust</option>
            <option value="scala" id="scala">Scala</option>
            <option value="r" id="r">R</option>
            <option value="perl" id="perl">Perl</option>
        </select>
            <button wire:click="getRandomRepository" class="mt-4 bg-green-700 text-white py-2 px-4 rounded hover:bg-green-600" wire:loading.attr="disabled" wire:loading.class="bg-gray-500">
                <span wire:loading.remove>Obtener otro repositorio</span>
                <span wire:loading>Buscando...</span>
            </button>

            <h2 class="mt-4">Límite de estrellas</h2>
            <input type="number" id="stars" wire:model="stars" class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Ingresa el número de estrellas">
    </div>
</section>

