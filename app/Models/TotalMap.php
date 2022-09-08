<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalMap extends Model
{
    use HasFactory;
    protected $fillable = ['book_id','state_id','month','title','body'];
    public function scopeState($query){
        if (auth()->user()->hasRole('admin')){
            return $query;
        }
        return $query->where('state_id',auth()->user()->state_id);
    }
    public function state(){
        return $this->belongsTo(\App\Models\State::class);
    }
    public function book(){
        return $this->belongsTo(\App\Models\Book::class);
    }
}
