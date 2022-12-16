<?php

namespace App\View\Components;

use App\Models\Message;
use Illuminate\View\Component;

class ReceiveMessageCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Message $message)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.receive-message-card');
    }
}
