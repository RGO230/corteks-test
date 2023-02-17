<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumTrack extends Model
{
    use HasFactory;
    protected $fillable = ['track_id','album_id','order_number'];
}
