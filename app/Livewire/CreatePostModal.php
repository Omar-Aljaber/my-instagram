<?php

namespace App\Livewire;

use Exception;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class CreatePostModal extends ModalComponent
{
    use WithFileUploads;

    public $image;

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function save_temp()
    {
        $this->validate([
            'image' => 'image:max:2048',
        ]);
        $image = $this->image->store('temp', 'public');
        $this->dispatch('openModal','filter-modal', ['image'=>$image]);
    }

    public function render()
    {
        return view('livewire.create-post-modal');
    }
}
