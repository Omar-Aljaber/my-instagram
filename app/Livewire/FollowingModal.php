<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\On;

class FollowingModal extends ModalComponent
{
    
    public $userId;
    protected $user;

    #[On('unfollowUser')] 
    public function getFollowingListProperty()
    {
        $user = User::find($this->userId);
        return $user->following()->wherePivot('confirmed', true)->get();
    }

    public function unfollow($userId)
    {
        $following_user = User::find($userId);
        $this->user = User::find($this->userId);
        $this->user->unfollow($following_user);
        $this->dispatch('unfollowUser');
    }

    public function render()
    {
        return view('livewire.following-modal');
    }
}
