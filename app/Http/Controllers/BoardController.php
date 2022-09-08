<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardFile;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'file'=>'nullable|max:10000|mimes:zip,rar,pdf,jpg,jpeg,png',
            'keywords'=>'required',
        ]);

        $board = Board::create([
            'title' => $request->title,
            'body' => $request->body,
            'keywords' => json_encode(explode(' ',$request->keywords)),
            'user_id' => auth()->user()->id,
            'book_id'=> $request->book_id??null,
            'season_id'=> $request->season_id??null,
            'user_id'=> auth()->user()->id,
        ]);
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = uniqid().$file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
            BoardFile::create([
                'board_id' => $board->id,
                'path' => $file_name,
            ]);
        }

        return redirect()->back()->with('message',['type'=>'success','message'=>'پست شما با موفقیت ثبت شد و پس از تایید منتشر خواهد شد.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
