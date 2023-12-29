<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class ProfileEdit extends Component
{

    public ?string $title;

    public function mount(): void
    {
        $this->title = __('Profile') . ' - ' . __('Edit');
    }

    public function render()
    {
        return view('livewire.profile.profile-form')->title($this->title);
    }
}
