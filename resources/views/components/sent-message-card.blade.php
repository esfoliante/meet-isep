<div class="w-full flex items-center justify-end">
    <div class="w-3/4 md:w-1/3 flex flex-col space-y-3 text-left bg-primary bg-opacity-70 rounded-tl-lg rounded-tr-lg rounded-bl-lg py-3 px-3">
        <div class="text-gray-100 text-xs md:text-sm flex space-x-2">
            <p>Tu</p>
            <p>{{ \Carbon\Carbon::createFromDate($message->created_at)->diffForHumans() }}</p>
        </div>
        <p class="text-sm md:text-md max-w-2xl text-white">{{ $message->content }}</p>
    </div>
</div>
