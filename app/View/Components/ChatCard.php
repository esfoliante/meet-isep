<?php

namespace App\View\Components;

use App\Models\PictureUser;
use App\Models\User;
use Illuminate\View\Component;

class ChatCard extends Component
{

    public String $photo = "";

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $chat)
    {
        $this->photo = "https://ui-avatars.com/api/?name=" . $chat['name']. "&size=512";

        $pictureUser = PictureUser::where(['user_id' => $chat['user_id']])->latest()->first();

        if($pictureUser) {
            $this->photo = asset($pictureUser->file);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chat-card');
    }
}
