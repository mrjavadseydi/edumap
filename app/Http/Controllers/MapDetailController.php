<?php

namespace App\Http\Controllers;

use App\Models\MapDetail;
use App\Models\MapSeason;
use App\Models\NeedMap;
use Illuminate\Http\Request;

class MapDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request()->get('id');
        $details = MapDetail::where('map_season_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('panel.need.detail.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = request()->get('id');
        $season = MapSeason::find($id);
        $map = NeedMap::find($season->need_map_id);
        return view('panel.need.detail.create', compact('season', 'map'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = request()->get('id');
        $season = MapSeason::find($id);
        $map = NeedMap::find($season->need_map_id);
        MapDetail::create([
            'map_season_id' => $id,
            'title' => $request->title,
            'body' => $request->body,
            'need_map_id' => $map->id
        ]);
        return redirect()->route('needDetail.index', ['id' => $id]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = MapDetail::find($id);
        $season = MapSeason::find($detail->map_season_id);
        $map = NeedMap::find($season->need_map_id);
        return view('panel.need.detail.edit', compact('detail', 'season', 'map'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detail = MapDetail::find($id);
        $detail->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route('needDetail.index', ['id' => $detail->map_season_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = MapDetail::find($id);
        $detail->delete();
        return response()->json(['status' => 'ok']);
    }
}
