<?php

namespace App\Http\Livewire\Personal;

use App\Models\Like;
use Livewire\Component;

class Comment extends Component
{
    public  $like,$dislike,$comment,$reply,$parent;
    public function mount($comment,$reply=false,$parent=null){
        $this->comment = $comment;

        $this->parent= $parent;
        $this->reply = $reply;
        $this->calcLikes();
    }
    public function calcLikes(){
        $this->like = Like::where([['comment_id',$this->comment->id],['type',1]])->count();
        $this->dislike = Like::where([['comment_id',$this->comment->id],['type',0]])->count();
    }
    public function doLike(){
        $like = Like::where([['comment_id',$this->comment->id],['ip',request()->ip()]])->first();
        if($like){
            $like->update([
                'type'=>1
            ]);

        }else{
            Like::create([
                'ip'=>request()->ip(),
                'type'=>1,
                'comment_id'=>$this->comment->id
            ]);

        }
        $this->calcLikes();

    }
    public function doDisLike(){
        $like = Like::where([['comment_id',$this->comment->id],['ip',request()->ip()]])->first();
        if($like){
            $like->update([
                'type'=>0
            ]);

        }else{
            Like::create([
                'ip'=>request()->ip(),
                'type'=>0,
                'comment_id'=>$this->comment->id
            ]);
        }
        $this->calcLikes();

    }

    public function initReply()
    {
        $this->emit('initReplyComment',$this->comment->id);
    }
    public function render()
    {
        return view('livewire.personal.comment');
    }
}
