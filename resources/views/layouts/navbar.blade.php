<nav>
    <div class="flex px-12 py-6 bg-zinc-800 text-white gap-10">
        <div class="flex gap-10">
            <x-link class="hover:bg-zinc-400" href="/dashboard" :active="request()->is('dashboard')">{{ __('Dashboard')
                }}</x-link>
            @auth
            <x-link class="hover:bg-zinc-400" href="/user" :active="request()->is('user')">{{ __('User') }}</x-link>
            <x-link class="hover:bg-zinc-400" href="/toko" :active="request()->is('toko')">{{ __('Toko') }}</x-link>
            @else
            <x-link class="hover:bg-zinc-400" href="/loginuser" :active="request()->is('login')">{{ __('Login') }}</x-link>

            @endauth
            <x-link class="hover:bg-zinc-400" href="/about" :active="request()->is('about')">{{ __('About') }}</x-link>
            <x-link class="hover:bg-zinc-400" href="/contak" :active="request()->is('contak')">{{ __('Contak') }}
            </x-link>
            @auth
            <x-link class="hover:bg-zinc-400" href="{{ route('logout') }}" :active="request()->is('logout')">{{ __('Log out') }} </x-link>
            <x-link class="hover:bg-zinc-400" href="{{ route('approve.index') }}" :active="request()->is('logout')">{{ __('Toko Approve') }} </x-link>
                    
            @endauth
        </div>
    </div>
</nav>