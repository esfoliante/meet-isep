<a href="{{ route('chats.show', ['pair_id' => $chat['pair_id']]) }}">
    <div class="w-full h-20 py-2 px-5 flex items-center justify-between border border-gray-200 shadow rounded hover:bg-primary hover:bg-opacity-10 transition ease-in-out">
        <div class="flex items-center space-x-5">
            <img src="{{ $photo }}" class="h-14 w-14 w-full rounded-full shadow" />
            <p class="font-semibold">{{ $chat['name'] }}</p>
            @if(count(\App\Models\Message::where(['receiver_id' => auth()->user()->id, 'sender_id' => $chat['user_id'], 'read' => false])->get()) >= 1)
                <div class="ml-2 w-4 h-4 flex items-center justify-center p-1 bg-primary text-white text-xs rounded-full">
                    {{ count(\App\Models\Message::where(['receiver_id' => auth()->user()->id, 'sender_id' => $chat['user_id'], 'read' => false])->get()) }}
                </div>
            @endif
        </div>
        <x-feathericon-eye></x-feathericon-eye>
    </div>
</a>
