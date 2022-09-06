<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::orderBy('id','desc')->paginate(10);
        return view('panel.comment.index',compact('comments'));
    }
    public function update($id,$status){
        Comment::where('id',$id)->update([
            'status' => $status
        ]);
        return back()->with('message',['type'=>'success','message'=>'با موفقیت انجام شد']);
    }
    public function delete(Request $request){
        Comment::whereId($request->id)->delete();
        return response()->json(['status'=>'ok']);
    }
}
