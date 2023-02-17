<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function retrieve(){
       return response()->json( Album::all());
    }
    public function create(Request $request){
        $request->validate([
            'title'=>'required|string',
            'author_id'=>'required|exists:authors,id',
            'release'=>'date',
        ]);
        return Album::create($request->all());
    }
   
    public function update(Album $album, Request $request){
        $request->validate([
            'title'=>'required|string',
            'author_id'=>'required|exists:authors,id',
            'release'=>'date',
        ]);
        return Album::where('id',$album->id)->update($request->all());

    }
    public function delete(Album $album){
        return response()->json('Альбом удалён');
    }
    public function trackInAlbum(Request $request)
    {
        // $request->validate([
        //     'track_id'=>'requried|exists:tracks,id'
        // ]);
        $track=$request->track_id;
        $tracks = Album::WhereHas('tracks',function($q)use($track){
            $q->where('track_id',$track);
        })->get();
        return response($tracks);
    }
}
