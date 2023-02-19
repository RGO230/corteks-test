<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumTrack;
use Illuminate\Http\Request;




class AlbumController extends Controller
{
    /**
     * @OA\Get(
     *      path="api/album/",
     *      tags={"Album"},
     *      summary="Альбомы",
     *      description="Возвращаются все альбомы",
     *      @OA\Property(
    *type="array",
    *collectionFormat="multi",
   
*),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Album")
     *       ),    
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function retrieve(){
        return response()->json(Album::with('tracks')->get());
    
    }
   /**
     * @OA\Post(
     *      path="api/album/",
     *      tags={"Album"},
     *      summary="Альбомы",
     *      description="Создаёт новый альбом",
      *       @OA\Parameter(
     *       name="track_id",
     *       description="Id песен",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="integer"
     *          )
   
     *       ),
     *      @OA\Parameter(
     *       name="title",
     *       description="Название альбома",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="string"
     *          )
   
     *       ),
     *       @OA\Parameter(
     *       name="release",
     *       description="Дата издания",
     *       required=false,
     *       in="query",
     *       @OA\Schema(
     *             type="date"
     *          )
   
     *       ),
     *       @OA\Parameter(
     *       name="Author_id",
     *       description="Id Автора",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="integer"
     *          )
   
     *       ),
     *  *       @OA\Parameter(
     *       name="order_number",
     *       description="Порядковые номера песен",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="integer"
     *          )
   
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),    
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function create(Request $request){
        
        $request->validate([
            'title'=>'required|string',
            'author_id'=>'required|exists:authors,id',
            'release'=>'date',
            'track_id'=>'required|array',
            'track_id.*'=>'required|int|exists:tracks,id',
            'order_number'=>'required|array',
            'order_number.*'=>'required|integer',
        ]);
        $tracks=$request->track_id;
        $album=new Album;
        $album->title=$request->title;
        $album->author_id=$request->author_id;
        $album->release=$request->release;
        $album->save();
        $album->tracks()->attach($tracks,['order_number'=>$request->order_number]);
        return response("Альбом создан");
    }
    /**
     * @OA\Put(
     *      path="api/album/{id}",
     *      tags={"Album"},
     *      summary="Альбомы",
     *      description="Создаёт новый альбом",
      *       @OA\Parameter(
     *       name="track_id",
     *       description="Id песен",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="integer"
     *          )
   
     *       ),
     *      @OA\Parameter(
     *       name="title",
     *       description="Название альбома",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="string"
     *          )
   
     *       ),
     *       @OA\Parameter(
     *       name="release",
     *       description="Дата издания",
     *       required=false,
     *       in="query",
     *       @OA\Schema(
     *             type="date"
     *          )
   
     *       ),
     *       @OA\Parameter(
     *       name="Author_id",
     *       description="Id Автора",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="integer"
     *          )
   
     *       ),
     *  *       @OA\Parameter(
     *       name="order_number",
     *       description="Порядковые номера песен",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="integer"
     *          )
   
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),    
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
   
    public function update(Request $request){
        $request->validate([    
            'title'=>'required|string',
            'author_id'=>'required|exists:authors,id',
            'release'=>'date',
            'track_id'=>'required|array',
            'track_id.*'=>'required|int|exists:tracks,id',
            'order_number'=>'required|array',
            'order_number.*'=>'required|integer',
        ]);

        Album::where('id', $request->id)->update(['title'=>$request->title,'release'=>$request->release,'author_id'=>$request->author_id]);
        AlbumTrack::where('album_id',$request->id)->update(['track_id'=>$request->track_id,'order_number'=>$request->order_number]);
        return response("Альбом изменен");
    }
   /**
     * @OA\Delete(
     *      path="api/album/{id}",
     *      tags={"Album"},
     *      summary="Альбомы",
     *      description="Создаёт новый альбом",
      *       @OA\Parameter(
     *       name="id",
     *       description="Id",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="integer"
     *          )
   
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),    
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
 
    public function delete(Request $request){
        Album::where('id',$request->id)->delete();
        return response()->json('Альбом удалён');
    }

}
