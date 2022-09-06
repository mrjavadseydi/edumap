<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\State;
use Livewire\Component;

class UserProvince extends Component
{
    public $user;
    public $provinces;
    public $province_id;
    public $states=[];
    public function mount($user){
        $this->user = $user;
        $this->provinces = Province::all();
        if($user->province_id){
            $this->province_id = $user->province_id;
            $this->states = State::where('province_id',$user->province_id)->get();
        }else{
            $this->states = State::where('province_id',$this->province_id)->get();
        }
    }
    public function updateState()
    {
        $this->states = State::where('province_id',$this->province_id)->get();
    }
    public function render()
    {
        return view('livewire.user-province');
    }
}
