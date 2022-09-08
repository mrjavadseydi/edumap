<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedMap extends Model
{
    use HasFactory;
    protected $fillable = ['title','month','book_id'];
    public function season(){
        return $this->hasMany(MapSeason::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
