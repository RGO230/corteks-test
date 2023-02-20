<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * @OA\Get(
     *      path="api/author/",
     *      tags={"Author"},
     *      summary="Авторы",
     *      description="Возвращаются всех исполнителей",
     *      @OA\Property(
    *type="array",
    *collectionFormat="multi",
   
*),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Author")
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
        return response()->json(Author::all());
    }
    /**
     * @OA\Post(
     *      path="api/author/",
     *      tags={"Author"},
     *      summary="Авторы",
     *      description="Создание автора",
     *      @OA\Property(
    *type="array",
    *collectionFormat="multi",
   
*),


*       @OA\Parameter(
     *       name="initials",
     *       description="Имя исполнителя",
     *       required=true,
     *       in="query",
     *       @OA\Schema(
     *             type="string"
     *          )
   
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Author")
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
            'initials'=>'required|string',
        ]);
        return response(Author::create($request->all()));
    }
    /**
     * @OA\Put(
     *      path="api/author/{id}",
     *      tags={"Author"},
     *      summary="Авторы",
     *      description="Меняет исполнителя",
     *      @OA\Property(
    *type="array",
    *collectionFormat="multi",
   
*),


*       @OA\Parameter(
     *       name="initials",
     *       description="Имя исполнителя",
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
     *          @OA\JsonContent(ref="#/components/schemas/Author")
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
    public function update(Request $request,Author $author){
        $request->validate([
            'initials'=>'required|string',
        ]);
        return response()->json(Author::where('id',$author->id)->update($request->all()));
    }
     /**
     * @OA\Delete(
     *      path="api/author/{id}",
     *      tags={"Author"},
     *      summary="Авторы",
     *      description="удаляет исполнителя",
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
     *          @OA\JsonContent(ref="#/components/schemas/Author")
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
        Author::where('id',$request->id)->delete();
        return response()->json('Автор удалён');
    }
    /**
     * @OA\Get(
     *      path="api/reletionauthor/",
     *      tags={"Author"},
     *      summary="Авторы",
     *      description="Возвращаются исполнителя с его альбомами",
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
     *          @OA\JsonContent(ref="#/components/schemas/Author")
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
    public function withAlbum(Request $request)
    {   
    
        return response()->json(Author::with('Authors')->where('id',$request->id)->get());
    }
}
