<?php

namespace App\Http\Livewire\Map;

use App\Models\Province;
use App\Models\State;
use Livewire\Component;

class StateSelect extends Component
{
    public $provinces;
    public $province_id,$state_id;
    public $states=[];
    public $user;
    public $map;
    public function mount($map=null){

        $this->user = auth()->user();
        $this->provinces = Province::all();
        $this->map = $map;
        if ($map){
            $state = State::find($map->state_id);
            $this->province_id = $state->province_id;
            $this->states = State::where('province_id',$this->province_id)->get();
            $this->state_id = $map->state_id;
        }else{
            if(!$this->user->hasRole('admin')){
                $this->province_id = $this->user->province_id;
                $this->states = State::where('province_id',$this->user->province_id)->get();
            }else{
                $this->states = [];
            }
        }

    }
    public function updateState()
    {
        $this->states = State::where('province_id',$this->province_id)->get();
    }
    public function render()
    {
        return view('livewire.map.state-select');
    }
}
