<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PhpParser\Node\Stmt\Return_;

class LikePost extends Component
{
    public $post;
    public $islike;
    public $likes;
    public function mount($post)
    {
        $this->islike = $post->checklike(auth()->user());
        $this->likes = $post->likes->count();
    }
    public function render()
    {
        return view('livewire.like-post');
    }
    public function like()
    {
        if ($this->post->checklike(auth()->user())) {
            //eliminarlo
            $this->post->likes()->where('post_id',$this->post->id)->delete();
            $this->islike = false;
            $this->likes--;

        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
               ]);
            $this->islike = true;
            $this->likes++;
        }
    }
}
