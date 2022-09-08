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
    public function store(Request $request){
        Comment::create([
            'commentable_id' => $request->commentable_id,
            'commentable_type' => $request->commentable_type,
            'keywords' => json_encode(explode(' ',$request->keywords)),
            'status'=>0,
            'user_id'=>auth()->id(),
            'state_id'=>auth()->user()->state_id,
            'body'=>$request->body,
        ]);
        return back()->with('message',['type'=>'success','message'=>'نظر شما با موفقیت ثبت شدو پس از بررسی منتشر خواهد شد.']);

    }
}
