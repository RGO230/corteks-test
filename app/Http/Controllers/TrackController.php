<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function retrieve(Request $request){
        return response()->json(Track::all());
    }
    public function create(Request $request){
        $request->validate([
            'title'=>'required|string',
        ]);
        return Track::create($request->all());
    }
    public function update(Request $request,Track $track){
        $request->validate([
            'title'=>'required|string',
        ]);
        return Track::where('id',$track->id)->update($request->all());
    }
    public function delete(Track $author){
        return response()->json('Песня удалена');
    }
    public function inAlbum(Request $request)
    {
        // $request->validate([
        //     'album_id'=>'requried|exists:albums,id'
        // ]);
        $album=$request->album_id;
        $tracks = Track::WhereHas('albums',function($q)use($album){
            $q->where('album_id',$album);
        })->first();
        return response($tracks);
    }
}
