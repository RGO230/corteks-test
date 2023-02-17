<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumTrack;
use Illuminate\Http\Request;

class AlbumTrackController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'track_id'=>'required|exists:tracks,id',
            'album_id'=>'required|exists:albums,id',
            'order_number'=>'required|int',
        ]);
        return AlbumTrack::create($request->all());

    }
}
