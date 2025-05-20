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

                <div x-data="{ open: false }">
                    <button @click="open = true"
                        class="px-3 py-1.5 bg-zinc-500 hover:bg-zinc-700 cursor-pointer text-white rounded">
                        {{ __('Approve') }}
                    </button>


                    <!-- Popup overlay -->
                    <!-- Alert Popup -->
                    <!-- Alert Popup dengan efek slide dari atas ke bawah -->
                    <div x-show="open" x-transition:enter="transition transform duration-500"
                        x-transition:enter-start="-translate-y-full opacity-0"
                        x-transition:enter-end="translate-y-0 opacity-100"
                        x-transition:leave="transition transform duration-500"
                        x-transition:leave-start="translate-y-0 opacity-100"
                        x-transition:leave-end="-translate-y-full opacity-0"
                        class="fixed top-10 left-0 right-0 flex justify-center" style="display: none;">
                        <div class="bg-zinc-700 p-6 rounded shadow-lg max-w-sm w-1/2">
                            <p>{{ __('APROVE DATA !!') }}</p>
                            <div class="flex justify-end gap-4 mt-4 ">
                                <button @click="open = false"
                                    class="cursor-pointer px-4 py-2 border border-zinc-50 text-white rounded">
                                    back
                                </button>
                                <form action="{{ route('approve.toko',['toko'=>$toko->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="cursor-pointer px-4 py-2 bg-emerald-500 text-white rounded">
                                        approve
                                    </button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            @endforeach
        </div>



    </main>


    @endslot

</x-app-layout>
