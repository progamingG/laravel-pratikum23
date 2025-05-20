<x-app-layout>
    <main class="pt-10 pl-10">
        <div class="max-w-4xl mx-auto mt-10 bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-zinc-900 dark:text-white">Detail Pengguna</h2>

            <div class="mt-4">
                <p class="text-zinc-700 dark:text-zinc-300"><strong>Nama:</strong> {{ $user->name }}</p>
                <p class="text-zinc-700 dark:text-zinc-300"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="text-zinc-700 dark:text-zinc-300"><strong>Dibuat pada:</strong> {{
                    $user->created_at->format('d M Y') }}</p>
            </div>

            <div class="mt-6 flex gap-2">
                <a href="{{ route('user.index') }}"
                    class="px-4 py-2 bg-zinc-600 text-white rounded-md hover:bg-zinc-700 transition duration-200 ease-in-out">
                    Kembali
                </a>
                <a href="{{ route('user.edit', $user->id) }}"
                    class="px-4 py-2 bg-emerald-700 text-white rounded-md hover:bg-emerald-800 transition duration-200 ease-in-out">
                    Edit
                </a>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cursor-pointer px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 transition duration-200 ease-in-out">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>