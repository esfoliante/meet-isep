<div class="w-full">
    <div class="w-3/4 md:w-1/3 flex flex-col space-y-3 text-left bg-primary rounded-tl-lg rounded-tr-lg rounded-br-lg py-3 px-3">
        <div class="text-gray-200 text-xs md:text-sm flex space-x-2">
            <p>{{ $message->sender->name }}</p>
            <p>{{ \Carbon\Carbon::createFromDate($message->created_at)->diffForHumans() }}</p>
        </div>
        <p class="text-sm md:text-md max-w-2xl text-white">{{ $message->content }}</p>
    </div>
</div>
