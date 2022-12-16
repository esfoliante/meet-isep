<x-app-layout>
    <div class="w-full h-full px-10 md:px-20 py-28">
        <h1 class="font-bold text-xl">Perfil - {{ auth()->user()->name }}</h1>

        <livewire:profile.edit />
    </div>
</x-app-layout>
