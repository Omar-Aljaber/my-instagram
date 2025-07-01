<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class EditPostModal extends ModalComponent
{

    use WithFileUploads;
    
    public $postid;
    protected $post;
    public $description;
    public $newImage;

    public function mount($postid)
    {
        $this->postid=$postid;
        $this->post=Post::find($postid);
        $this->description=$this->post->description;
    }
    
    public static function modalMaxWidth(): string
    {
        return '5xl';
    }


    public function update()
    {
        $post=Post::find($this->postid);
        
        if(!$post)
        {
            session()->flash('error','Post not found');
            return;
        }

        $this->validate([
           'description'=>'required',
           'newImage'=>'nullable|image|max:10240' 
        ]);

        $updateData=['description'=>$this->description];
        
        if(empty($this->description))
        {
            $errorMessage=__('description_empty');
            session()->flash('error',$errorMessage);
            return redirect()->route('show_post',['post'=>$post->slug]);
        }
        
        if($this->newImage)
        {
            Storage::delete('public/',$post->image);
            
            $imagePath=$this->newImage->store('posts','public');
            $updateData['image']=$imagePath;
        }
        


        $post->update($updateData);
        $this->closeModal();
        
        return redirect()->route('show_post',['post'=>$post->slug]);
    }
    
    public function render()
    {
        return view('livewire.edit-post-modal');
    }
}