<x-app-layout>
    @slot('header')
    <div class="mt-4 mb-4 pl-10">
        <h1 class="text-2xl font-bold ">
            Tokos
        </h1>
    </div>
    <main class="px-10">

        <div class="grid grid-cols-4 gap-5">
            @foreach ($tokos as $toko)
            <div class="bg-zinc-600 rounded p-4">
                <h2 class="text-xl ">{{ $toko->nama }}</h2>
                <p class="text-lg text-zinc-400 mb-4">{{ str()->limit($toko->alamat,20) }}</p>
                <!-- Tombol untuk membuka popup -->
            </div>

            @endforeach
        </div>
        <div class="mt-10">
            {{ $tokos->links() }}
        </div>
        </div>


    </main>


    @endslot

</x-app-layout>

