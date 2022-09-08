<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\NeedMap;
use Illuminate\Http\Request;

class NeedMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = NeedMap::with('season')->orderBy('id', 'desc')->paginate(10);
        return view('panel.need.index', compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.need.create', ['books' => Book::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NeedMap::create([
            'title' => $request->title,
            'book_id' => $request->book_id,
        ]);
        return redirect()->route('need.index')->with('message', ['type' => 'success', 'message' => 'نقشه ایجاد شد ']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('panel.need.edit', ['books' => Book::all(), 'map' => NeedMap::find($id)]);

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
        NeedMap::findOrfail($id)->update([
            'title' => $request->title,
            'book_id' => $request->book_id,
        ]);
        return redirect()->back()->with('message', ['type' => 'success', 'message' => 'نقشه ویرایش شد ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NeedMap::findOrfail($id)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function show($id){
        $map = NeedMap::findOrFail($id);
        return view('need',compact('map'));
    }

}
