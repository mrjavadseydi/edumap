<?php

namespace App\Http\Livewire\Personal;

use App\Models\Book;
use App\Models\Season;
use App\Models\Topic;
use Livewire\Component;

class Index extends Component
{
    public $books,$book_id,$seasons=[],$season_id,$topics=[],$topic_id,$comments=null,$add_comment=false,$reply_comment = null,$commentable,$commentable_id;
    protected $listeners = ['initReplyComment'=>'initReplyComment'];
    public function updateSeasons()
    {
        $this->topics=[];
        $this->seasons = Book::find($this->book_id)->seasons;
        $topics_id = Topic::whereIn('season_id',$this->seasons->pluck('id'))->pluck('id');
        $this->comments=\App\Models\Comment::where([['commentable_type','App\Models\Topic'],['status',1]])->whereIn('commentable_id',$topics_id)->get();
    }
    public function updateTopics(){
        $this->topics = Topic::where('season_id',$this->season_id)->get();
        $this->comments=\App\Models\Comment::where([['commentable_type','App\Models\Topic'],['status',1]])->whereIn('commentable_id',$this->topics->pluck('id'))->get();

    }

    public function updateComments()
    {
        $this->comments = \App\Models\Comment::where([['commentable_id',$this->topic_id],['commentable_type','App\Models\Topic'],['status',1]])->get();
        $this->add_comment = true;
    }
    public function initComment(){
           $this->commentable = Topic::class;
           $this->commentable_id = $this->topic_id;

    }
    public function initReplyComment($id){
        $this->commentable = \App\Models\Comment::class;
        $this->commentable_id = $id;
    }

    public function render()
    {
        $this->books = Book::all();
        return view('livewire.personal.index');
    }
}
