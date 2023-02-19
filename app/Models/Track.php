<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     title="Песня",
 *     description="Track model",
 *     @OA\Xml(
 *         name="Песня"
 *     )
 * )
 */
class Track extends Model
{
         /**
     * @OA\Property(
     *     title="title",
     *     description="Название альбома",
     *     format="string",
     *     example="Daddy"
     * )
     *
     * @var string
     */
    private $title;

    use HasFactory;
    protected $fillable = ['title'];
    public function albums(){
        return $this->belongsToMany(Album::class);
    }
    public function order(){
        return $this->belongsToMany(Order::class);
    }
}
