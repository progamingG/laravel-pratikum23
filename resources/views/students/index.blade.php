<x-app-layout>
    <main class="p-12">


        <div class="flex flex-col gap-2">

            <h1 class="text-2xl font-semibold">{{ request()->user()->name }}</h1>

            <x-link href="{{ route('user.create') }}"
                class="text-sm bg-emerald-700 hover:bg-emerald-800 px-6 py-2 self-start rounded mb-2">
                Add
            </x-link>
            <div class="relative overflow-x-auto  sm:rounded-lg flex justify-left lg:w-full sm:w-full ">
               
                    <table class="w-full text-sm text-left text-zinc-500">
                        <thead class="text-xs text-zinc-400 uppercase bg-zinc-700 rounded">
                            <tr class="">
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Create at</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($users as $user)
                            <tr class="odd:bg-zinc-800 event:bg-zinc-800 border-b border-zinc-700">
                                <th class=" border-zinc-500 px-6 py-3">{{ $loop->iteration }}</th>
                                <th class=" border-zinc-500 px-6 py-3">{{ $user->name }}</th>
                                <th class=" border-zinc-500 px-6 py-3">{{ $user->email }}</th>
                                <th class=" border-zinc-500 px-6 py-3">{{ $user->created_at->diffForHumans() }}</th>
                                <th class=" border-zinc-500 flex  justify-between px-6 py-3">
                                    <x-link href="{{route('user.show',['user' => $user->id])}}" class="text-emerald-900">Detail</x-link>
                                    <x-link href="{{route('user.edit', ['user'=>$user->id])}}" class="text-yellow-700">Edit</x-link>
                                    <form action="{{ route('user.destroy', ['user'=>$user->id]) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" onclick="return confirm('yakin?')"
                                            class="text-red-700 hover:cursor-pointer">Hapus</button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </main>
</x-app-layout>