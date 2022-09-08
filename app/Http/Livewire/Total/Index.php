<?php

namespace App\Http\Livewire\Total;

use App\Models\TotalMap;
use Livewire\Component;

class Index extends Component
{
    public $books ,$book_id,$months=[] ,$month,$maps =[] ;
    public function updateMonth(){
        $this->months = TotalMap::where('book_id',$this->book_id)->state()->groupBy('month')->pluck('month');
    }
    public function updateMaps(){
        $this->maps = TotalMap::where('book_id',$this->book_id)->state()->where('month','like',$this->month)->get();
    }
    public function render()
    {
        $this->books = \App\Models\Book::all();
        return view('livewire.total.index');
    }
}
