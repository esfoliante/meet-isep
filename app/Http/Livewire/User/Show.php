<?php

namespace App\Http\Livewire\User;

use App\Models\Meet;
use App\Models\Pair;
use App\Models\PictureUser;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Show extends Component
{

    use LivewireAlert;

    public User $user;
    public User $lastUser;

    public String $photo = "";

    public function mount(User $user) {
        $this->user = $user;

        $this->get_user_image();
    }

    public function match() : void {
        /**
         * We got to match these two people to create a beautiful relationship.
         * In order to match them we use the following rules:
         *
         * matcher_id --> the one that hit the like button
         * matched_id --> the "victim" that got liked
         */
        Meet::create([
            'matcher_id' => auth()->user()->id,
            'matched_id' => $this->user->id
        ]);

        /**
         * Now, we need to verify if the users like each other, in order to create a match!
         */
        if($this->verifyIfMatched(user: $this->user)) {
            /**
             * A pair is basically the match between two people.
             *
             * After the pair is created, it is allowed for one user
             * to text the other in the chat section
             */
            Pair::create([
                'first_user_id' => auth()->user()->id,
                'second_user_id' => $this->user->id
            ]);

            $sentence = "Parabéns 🎉! Tu e " . $this->user->name . " agora são um par, e podem mandar mensagens!";
            $this->alert(message: $sentence, options: [
                'toast' => false,
                'timer' => 5000,
                'showConfirmButton' => true,
                'confirmButtonText' => 'Ótimo!',
                'position' => 'center'
            ]);
        }

        $this->reroll();
    }

    public function reroll() : void {
        $this->lastUser = $this->user;

        $this->user = $this->findNewUser();
        $this->get_user_image();
    }

    private function findNewUser() : User {
        do {
            $user = User::all()->random(1)->first();

            $isinValidUser = $this->verifyIfPreviouslyLiked($user) || $user->id == auth()->user()->id || $user->id == $this->lastUser->id;
        } while($isinValidUser);

        return $user;
    }

    /**
     * With a simple instruction, we're going to verify if the
     * user has already liked the one chosen by the software.
     *
     * @return bool
     */
    private function verifyIfPreviouslyLiked(User $user) : bool {
        $usersMatch = Meet::where(['matcher_id' => auth()->user()->id, 'matched_id' => $user->id])->first();

        if($usersMatch) return true;

        return false;
    }

    /**
     * In this function we're going to verify if the other user
     * also liked the current user. If so, we return true
     *
     * @param User $user
     * @return bool
     */
    private function verifyIfMatched(User $user) : bool {
        $usersMatch = Meet::where(['matched_id' => auth()->user()->id, 'matcher_id' => $user->id])->first();

        if($usersMatch) return true;

        return false;
    }

    private function get_user_image() {
        $this->photo = "https://ui-avatars.com/api/?name=" . $this->user->name . "&size=512";

        $pictureUser = PictureUser::where(['user_id' => $this->user->id])->latest()->first();

        if($pictureUser) {
            $this->photo = asset($pictureUser->file);
        }
    }

    public function render()
    {
        return view('livewire.user.show');
    }
}
