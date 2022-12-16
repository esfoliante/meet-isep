<?php

namespace App\Http\Livewire\Chats;

use App\Models\Message;
use App\Models\Pair;
use Illuminate\Support\Collection;
use Livewire\Component;

class Show extends Component
{

    public Pair $pair;
    public int $pair_id = 0;

    public $messages;

    public int $second_user = 0;
    public String $message = "";

    public function mount(int $pair_id) {
        $this->pair_id = $pair_id;
        $this->pair = Pair::findOrFail($pair_id);

        if($this->pair->first_user_id == auth()->user()->id) {
            $this->second_user = $this->pair->second_user_id;
        } else {
            $this->second_user = $this->pair->first_user_id;
        }

        $this->get_messages();
    }

    public function send_message() {
        $this->message = trim($this->message);

        if($this->message == "") {
            $this->addError('message', 'Mensagem inválida');
            return;
        }

        Message::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $this->second_user,
            'content' => $this->message
        ]);
        $this->message = "";

        $this->get_messages();
    }

    private function get_messages() {
        $sentMessages = Message::where(['sender_id' => auth()->user()->id, 'receiver_id' => $this->second_user])->orderBy('id', 'desc')->get();
        $receivedMessages = Message::where(['sender_id' => $this->second_user, 'receiver_id' => auth()->user()->id])->orderBy('id', 'desc')->get();

        $this->messages = $sentMessages->merge($receivedMessages)->sortByDesc('id')->take(12)->sortBy('id');

        foreach($receivedMessages as $message) {
            $message->update([
                'read' => true
            ]);
        }
    }

    public function render()
    {
        return view('livewire.chats.show');
    }
}
