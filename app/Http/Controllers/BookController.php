<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Season;
use App\Models\Topic;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(){
        $books = Book::with('seasons')->paginate();
        return view('panel.book.index',compact('books'));
    }
    public function store(Request $request){
        $request->validate([
            'image'=>'required|image|max:2048',
        ]);
        $file = $request->file('image');
        $file_name = time().$file->getClientOriginalName();
        $file->move(public_path('uploads'),$file_name);
        $book = Book::query()->create(['title'=>$request->get('title'),'image'=>$file_name]);
        for($i=$request->start;$i<=$request->end;$i++) {
            Season::query()->create([
                'title' =>'فصل '.$i,
                'book_id' => $book->id
            ]);
        }
        foreach (explode("\n",$request->topics) as $topic){
            foreach (Season::query()->where('book_id',$book->id)->get() as $season){
               Topic::query()->create([
                   'title'=>$topic,
                   'season_id'=>$season->id
               ]);
            }
        }
        return redirect()->route('book.index')->with('message',['type'=>'success','message'=>'اطلاعات با موفقیت ثبت شد']);
    }
    public function delete(Request $request){

        Topic::whereIn('season_id',Season::where('book_id',$request->id)->pluck('id'))->delete();
        Season::where('book_id',$request->id)->delete();
        Book::query()->where('id',$request->get('id'))->delete();
        return response()->json(['status'=>'ok']);
    }
}
