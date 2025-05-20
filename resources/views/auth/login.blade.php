<x-app-layout>
    <main class="p-12">


        <div class="flex flex-col gap-2">

            <h1 class="text-2xl font-semibold">Login</h1>

            <div class="lg:w-1/2">
                <form action="{{route('login') }} " method="POST" class="space-y-10">
                    @csrf


                    {{-- email --}}
                    <label for=" input-group-1" class="mb-6 block text-sm font-medium text-zinc-900 dark:text-white">{{
                        __('Your Email') }}</label>
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-zinc-500 dark:text-zinc-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                    <path
                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                    <path
                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                </svg>
                            </div>
                            <input type="text" id="input-group-1"
                                class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@flowbite.com" required name="email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                        <span class="block text-red-700 mb-3 ">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- password --}}
                    <label for=" input-group-1"
                        class="mb-6 block text-sm font-medium text-zinc-900 dark:text-white">Your
                        Password</label>
                    <div class="mb-6">
                        <input type="password" id="confirm_password"
                            class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••" required name="password" value="{{ old('password') }}" />
                        @error('password')
                        <span class="text-red-700 mt-4">{{ $message }}</span>
                        @enderror
                    </div>



                    <button type="submit" class="bg-emerald-800 px-4 py-2 rounded cursor-pointer hover:bg-emerald-900">
                        {{ __('Login') }}</button>

                </form>
            </div>
        </div>
    </main>
</x-app-layout>