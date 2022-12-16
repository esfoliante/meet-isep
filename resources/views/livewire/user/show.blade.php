<div class="w-96 md:w-1/3 h-3/4 bg-white rounded shadow-lg p-10 flex flex-col items-center justify-center mt-20">
    <img src="{{ $photo }}" class="h-auto w-full rounded shadow" />
    <div class="w-full text-left">
        <div class="flex items-center mt-5 space-x-2">
            <p class="text-xl font-black uppercase">{{ $user->name }}</p>
            <p class="text-sm text-primary">{{ '@' . $user->username }}</p>
        </div>
        <p class="text-sm mt-3">{{ $user->course->name }}</p>
    </div>
    <div class="grid grid-cols-2 w-full gap-x-5 mt-5">
        <button wire:click="reroll" class="bg-gray-900 hover:bg-opacity-80 transition ease-in-out text-white rounded h-10 flex items-center justify-center">
            <x-feathericon-thumbs-down></x-feathericon-thumbs-down>
        </button>
        <button wire:click="match" class="bg-primary hover:bg-opacity-80 transition ease-in-out text-white rounded h-10 flex items-center justify-center">
            <x-feathericon-thumbs-up></x-feathericon-thumbs-up>
        </button>
    </div>
</div>
