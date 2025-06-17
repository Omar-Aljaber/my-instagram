<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Likedby extends Component
{
    public $post;

    #[On('LikeToggled')]
    public function getLikesProperty()
    {
        if ($this->post) {
            return $this->post->likes()->count();
        }
        return 0; 
    }

    public function getFirstusernameProperty()
    {
        if ($this->post && $this->post->likes()->first()) {
            return $this->post->likes()->first()->username;
        }
        return 'N/A'; 
    }

    public function render()
    {
        return view('livewire.likedby');
    }
}
