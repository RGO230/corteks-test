<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
     /**
     * @OA\Get(
     *      path="api/track/",
     *      tags={"Track"},
     *      summary="Песни",
     *      description="Возвращаются все песни",
     *      @OA\Property(
    *type="array",
    *collectionFormat="multi",
   
*),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Track")
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
    public function retrieve(Request $request){
        return response()->json(Track::all());
    }
     /**
     * @OA\Post(
     *      path="api/track/",
     *      tags={"Track"},
     *      summary="Треки",
     *      description="Создание песни",
     *      @OA\Property(
    *type="array",
    *collectionFormat="multi",
   
*),


*       @OA\Parameter(
     *       name="title",
     *       description="Название песни",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="string"
     *          )
   
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Track")
     *       ),    
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *     )
     */
    public function create(Request $request){
        $request->validate([
            'title'=>'required|string',
        ]);
        return Track::create($request->all());
    }
     /**
     * @OA\Put(
     *      path="api/track/{id}",
     *      tags={"Track"},
     *      summary="Песня",
     *      description="Меняет трэк",
     *      @OA\Property(
    *type="array",
    *collectionFormat="multi",
   
*),


*       @OA\Parameter(
     *       name="title",
     *       description="Название песни",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="string"
     *          )
   
     *       ),
     * *       @OA\Parameter(
     *       name="Id",
     *       description="Id",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="string"
     *          )
   
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Track")
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
    public function update(Request $request,Track $track){
        $request->validate([
            'title'=>'required|string',
        ]);
        return Track::where('id',$track->id)->update($request->all());
    }
    /**
     * @OA\Delete(
     *      path="api/track/{id}",
     *      tags={"Track"},
     *      summary="Песни",
     *      description="Удаляет песню",
     *      @OA\Property(
    *type="array",
    *collectionFormat="multi",
   
*),
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
     *          @OA\JsonContent(ref="#/components/schemas/Track")
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
        Track::where('id',$request->id)->delete();
        return response()->json('Песня удалена');
    }
}
