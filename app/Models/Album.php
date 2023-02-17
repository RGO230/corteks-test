<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['title','release','author_id'];
    public function tracks(){
        return $this->hasManyThrough(
        Track::class, AlbumTrack::class,
        'album_id','id','id','track_id'
        );
    }
    public function author(){
        return $this->belongsTo(Album::class);
    }
}
