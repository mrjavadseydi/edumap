<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BoardInfo extends Component
{
    public $type = 0;
    public $books =[],$seasons = [],$topics = [];
    public $book_id,$season_id,$topic_id;
    public function updateSeasons(){
        $this->seasons = \App\Models\Season::where('book_id',$this->book_id)->get();
    }
    public function updateTopics(){
        $this->topics = \App\Models\Topic::where('season_id',$this->season_id)->get();
    }
    public function render()
    {
        $this->books = \App\Models\Book::all();
        return view('livewire.board-info');
    }
}
