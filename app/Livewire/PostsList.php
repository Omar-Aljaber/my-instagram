<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostsList extends Component
{
    protected $listeners = ['toggleFollow' => '$refresh', 'postCreated' => 'addPostList'];

    public function getPostsProperty()
    {
       $ids = auth()->user()->following()->wherePivot('confirmed', true)->get()->pluck('id');
       return Post::whereIn('user_id', $ids)->latest()->get();
    }

    public function addPostList($postId)
    {
        $post = Post::find($postId);
        if ($post) {
            $this->posts->prepend($post);
        }
    }

    public function render()
    {
        return view('livewire.posts-list');
    }
}
