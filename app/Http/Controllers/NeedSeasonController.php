<?php

namespace App\Http\Controllers;

use App\Models\MapSeason;
use Illuminate\Http\Request;

class NeedSeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request()->get('id');
        $seasons = MapSeason::where('need_map_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('panel.need.season.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = request()->get('id');
        return view('panel.need.season.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = request()->get('id');
        $request->validate([
            'image'=>'required|image|max:2048',
        ]);
        $file = $request->file('image');
        $file_name = time().$file->getClientOriginalName();
        $file->move(public_path('uploads'),$file_name);

        MapSeason::create([
            'need_map_id' => $id,
            'title' => $request->title,
            'image' => $file_name,
        ]);
        return redirect()->route('needSeason.index', ['id' => $id])->with('message', ['type' => 'success', 'message' => 'فصل ایجاد شد ']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('panel.need.season.edit', ['season' => MapSeason::find($id)]);
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
        $request->validate([
            'image'=>'required|image|max:2048',
        ]);
        $file = $request->file('image');
        $file_name = time().$file->getClientOriginalName();
        $file->move(public_path('uploads'),$file_name);
        MapSeason::findOrfail($id)->update([
            'title' => $request->title,
            'image' => $file_name,
        ]);
        return redirect()->back()->with('message', ['type' => 'success', 'message' => 'فصل ویرایش شد ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MapSeason::findOrfail($id)->delete();
        return response()->json(['status' => 'ok']);
    }
}
