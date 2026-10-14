<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontak') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">

                    <h1 class="text-3xl font-bold text-gray-800 mb-6">
                        Tentang Saya
                    </h1>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500">Nama</p>
                            <p class="text-lg font-semibold">
                                Chandra Cornelius L Tobing
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">NPM</p>
                            <p class="text-lg font-semibold">
                                4524210022
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="text-lg font-semibold">
                                chandra@gmail.com
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h2 class="text-xl font-semibold mb-3">
                            Deskripsi
                        </h2>

                        <p class="text-gray-600 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```
