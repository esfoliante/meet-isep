<?php

namespace App\Http\Livewire\Profile;

use App\Models\PictureUser;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    public $user;

    public String $name = "";
    public String $email = "";
    public String $username = "";
    public $photo = null;
    public $new_photo = null;

    public int $course_id = 0;

    public function mount() {
        $this->user = auth()->user();
        $this->fill($this->user);

        $this->photo = PictureUser::where(['user_id' => $this->user])->latest()->first()->file ?? null;
    }

    public function submit() {
        $data = $this->validate([
            'name' => 'required|min:1',
            'username' => 'required|min:1|unique:users,username,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'course_id' => 'required|exists:courses,id'
        ]);

        if($this->new_photo != null) {
            $file = $this->new_photo->store('users', 'public');

            PictureUser::create([
                'file' => $file,
                'user_id' => $this->user->id
            ]);
        }

        $this->user->update($data);

        return redirect()->route('profile.index');
    }

    public function render()
    {
        return view('livewire.profile.edit');
    }
}
