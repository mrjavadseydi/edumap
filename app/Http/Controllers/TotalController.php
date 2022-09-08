<?php

namespace App\Http\Controllers;

use App\Models\TotalMap;
use Illuminate\Http\Request;

class TotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = TotalMap::orderBy('id','desc')->get();
        return  view('panel.total.index',compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = \App\Models\Book::all();
        $states = \App\Models\State::all();
        return view('panel.total.create',compact('books','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TotalMap::create($request->all());
        return redirect()->back()->with('message',['type'=>'success','message'=>'با موفقیت ایجاد شد']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('panel.total.edit',['map'=>TotalMap::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        TotalMap::findOrFail($id)->update($request->all());
        return redirect()->back()->with('message',['type'=>'success','message'=>'با موفقیت ویرایش شد']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TotalMap::findOrFail($id)->delete();
        return response()->json(['status'=>'ok']);
    }
}
