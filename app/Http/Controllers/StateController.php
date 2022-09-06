<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(){
        $states = State::with('province')->paginate(10,['*'],'states');
        $provinces = Province::paginate(10,['*'],'province');
        return view('panel.state.index',compact('states','provinces'));
    }
    public function store(Request $request){
        if ($request->has('province_id')){
            State::query()->create([
                'title'=>$request->get('title'),
                'province_id'=>$request->get('province_id')
            ]);
        }else{
            Province::query()->create([
                'title'=>$request->get('title')
            ]);
        }
        return redirect()->route('state.index')->with('message',['type'=>'success','message'=>'اطلاعات با موفقیت ثبت شد']);
    }
        public function delete(Request $request){
            if ($request->has('province_id')){
                Province::query()->where('id',$request->get('province_id'))->delete();
            }else{
                State::query()->where('id',$request->get('state_id'))->delete();
            }
            return response()->json(['status'=>'ok']);
        }

}
