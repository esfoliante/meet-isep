<x-app-layout>
    <div class="w-full h-full px-10 md:px-20 py-28">
        <h1 class="font-bold text-xl">{{ $receiver->name }}</h1>

        <livewire:chats.show :pair_id="$pair_id" />
    </div>
</x-app-layout>
