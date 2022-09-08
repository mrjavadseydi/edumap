<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardFile;
use Illuminate\Http\Request;

class BoardController extends Controller
{


    public function all(){
        $boards = Board::orderBy('id','desc');
        $boards = $this->filter($boards)->where('status',1)->paginate(10);
        return view('boards',compact('boards'));
    }
    public function filter($boards){
        if (\request()->has('search')){
            $boards = $boards->where('title','like','%'.request('search').'%')->orWhere('body','like','%'.request('search').'%')->orWhere('keywords','like','%'.request('search').'%');
        }
    return $boards;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::orderBy('id','desc')->paginate(10);
        return view('panel.board.index',compact('boards'));
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



    public function update( $id,$status)
    {
        Board::where('id',$id)->update([
            'status' => $status
        ]);
        return back()->with('message',['type'=>'success','message'=>'با موفقیت انجام شد']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Board::whereId($id)->delete();
        return response()->json(['status'=>'ok']);
    }
}
