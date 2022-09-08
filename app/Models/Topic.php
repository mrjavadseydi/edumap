<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['title','season_id'];
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
}
