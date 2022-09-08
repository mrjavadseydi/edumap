<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapDetail extends Model
{
    use HasFactory;
    protected $fillable = ['map_season_id','title','body','need_map_id'];
}
