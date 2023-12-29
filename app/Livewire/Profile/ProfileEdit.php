<?php

namespace App\Livewire\Profile;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\ProfileForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileEdit extends Component
{

    use AlertTrait;

    public ProfileForm $form;
    public ?string $title;

    public function mount(): void
    {
        $this->title = __('Profile') . ' - ' . __('Edit');

        $this->form->setEmployee(Auth::user()->employee);
    }

    public function save()
    {
        $this->authorize('manage-profile');

        $this->form->save();
        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Profile Informations')]));
        $this->redirectRoute('home');
    }

    public function changePassword()
    {
        $this->authorize('manage-profile');

        $this->form->changePassword();
        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Password')]));
        $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.profile.profile-form')->title($this->title);
    }
}
