<div class="w-full h-full">
    <div class="h-full overflow-y-auto border border-gray-300 px-5 py-5 rounded mt-5 space-y-5" wire:poll.100ms>
        @foreach($messages as $message)
            @if($message->sender_id == auth()->user()->id)
                <x-sent-message-card :message="$message"></x-sent-message-card>
            @else
                <x-receive-message-card :message="$message"></x-receive-message-card>
            @endif
        @endforeach
    </div>
    <div class="pb-10 mt-5">
        <label for="message">Mensagem</label>
        <input type="text" id="message" wire:model="message" class="w-full bg-white rounded border border-gray-300 bg-opacity-0 h-10" placeholder="O que desejas dizer? Não tenhas vergonha!" wire:keydown.enter="send_message" />
        @error('message') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>
</div>
