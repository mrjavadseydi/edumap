<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapSeason extends Model
{
    use HasFactory;
    protected $fillable = ['need_map_id','image','title'];
    public function detail(){
        return $this->hasMany(MapDetail::class);
    }
}
