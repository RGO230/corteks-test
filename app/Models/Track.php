<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    public function albums(){
        return $this->hasManyThrough(
        Album::class, AlbumTrack::class,
        'track_id','id','id','album_id'
        );
    }
}
