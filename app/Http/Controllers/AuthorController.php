<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function retrieve(){
        return response()->json(Author::all());
    }
    public function create(Request $request){
        $request->validate([
            'initials'=>'required|string',
        ]);
        return response(Author::create($request->all()));
    }
    public function update(Request $request,Author $author){
        $request->validate([
            'initials'=>'required|string',
        ]);
        return Author::where('id',$author->id)->update($request->all());
    }
    public function delete(Author $author){
        return response()->json('Автор удалён');
    }
    public function withAlbum(Request $request)
    {   
        $request->validate([
        'id'=>'required|int'
    ]);
        return response()->json(Author::with('albums')->where('id',$request->id)->get());
    }
}
