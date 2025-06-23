<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;


class Following extends Component
{
    public $userId;
    protected $user;

    protected $listeners = ['unfollowUser' => 'getCountProperty'];

    public function getCountProperty()
    {
        $this->user = User::find($this->userId);
        return $this->user->following()->wherePivot('confirmed', true)->count();
    }
    public function render()
    {
        return view('livewire.following');
    }
}
