<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\TotalMap;
use Illuminate\Http\Request;

class TotalController extends Controller
{
    public function checkRole(){
        if (!(auth()->user()->hasRole('admin')||auth()->user()->hasRole('manager'))){
            abort(403);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkRole();
        $maps = TotalMap::orderBy('id','desc')->states()->paginate();
        return  view('panel.total.index',compact('maps'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkRole();

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
        $this->checkRole();

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
        $this->checkRole();

        $months = [
            'فروردین',
            'اردیبهشت',
            'خرداد',
            'تیر',
            'مرداد',
            'شهریور',
            'مهر',
            'آبان',
            'آذر',
            'دی',
            'بهمن',
            'اسفند'
        ];
        return view('panel.total.edit',['map'=>TotalMap::findOrFail($id),'months'=>$months,'books' => Book::all()]);
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
        $this->checkRole();

        TotalMap::findOrFail($id)->update($request->all());
        return redirect()->back()->with('message',['type'=>'success','message'=>'با موفقیت ویرایش شد']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ً$id)
    {
        $this->checkRole();

        TotalMap::findOrFail($id)->delete();
        return response()->json(['status'=>'ok']);
    }
    public function show(){
        return view('total');
    }
}
