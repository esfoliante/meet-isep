<x-app-layout>
    <div class="w-full h-full px-10 md:px-20 py-28">
        <h1 class="font-bold text-xl">CHATS</h1>
        <div class="grid md:grid-cols-3 gap-y-10 md:gap-x-10 mt-10">
            @foreach($chats as $chat)
                <x-chat-card :chat="$chat"></x-chat-card>
            @endforeach
        </div>
    </div>
</x-app-layout>
