<div>
    <form wire:submit.prevent="submit" class="w-full grid md:grid-cols-3 gap-y-5 md:gap-x-10 mt-10">
        <div>
            <label for="name">Nome</label>
            <input type="text" id="name" wire:model="name" class="w-full bg-white mt-2 rounded border border-gray-300 bg-opacity-0 h-10" placeholder="O teu nome" />
            @error('name') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" wire:model="username" class="w-full bg-white mt-2 rounded border border-gray-300 bg-opacity-0 h-10" placeholder="O teu username" />
            @error('username') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
        <div></div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email" class="w-full bg-white mt-2 rounded border border-gray-300 bg-opacity-0 h-10 disabled:text-gray-400" placeholder="O teu e-mail" disabled />
            @error('email') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="file">Foto de perfil</label>
            <input type="file" id="file" wire:model="new_photo" class="w-full flex items-center bg-white mt-2 rounded border border-gray-300 bg-opacity-0 h-10" placeholder="O teu e-mail" />
            @error('file') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
        <div></div>
        <div>
            <label for="course_id">Curso</label>
            <select wire:model="course_id" class="w-full flex items-center bg-white mt-2 rounded border border-gray-300 bg-opacity-0 h-10">
                <option disabled>Selecione uma opção</option>
                @foreach(\App\Models\Course::all() as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course_id') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
        <div></div>
        <div></div>
        <x-primary-button>
            {{ __('Submeter') }}
        </x-primary-button>
    </form>
</div>
