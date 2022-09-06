<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\State;
use Livewire\Component;

class SignUpDetail extends Component
{
    public $provinces,$province_id,$states=[];
    public function updateState()
    {
        $this->states = State::where('province_id',$this->province_id)->get();
    }
    public function render()
    {
        $this->provinces = Province::all();
        return view('livewire.sign-up-detail');
    }
}
