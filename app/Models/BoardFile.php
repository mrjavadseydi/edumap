<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardFile extends Model
{
    use HasFactory;
    protected $fillable = ['board_id','path'];
}
