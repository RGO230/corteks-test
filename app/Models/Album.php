<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     title="Album",
 *     description="Album model",
 *     @OA\Xml(
 *         name="Album"
 *     )
 * )
 */
class Album extends Model
{
    use HasFactory;
    protected $fillable = ['title','release','author_id'];
    public function tracks(){
        return $this->belongsToMany(Track::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
     /**
     * @OA\Property(
     *     title="title",
     *     description="Название альбома",
     *     format="string",
     *     example="Lorelie"
     * )
     *
     * @var string
     */
    private $title;
    /**
     * @OA\Property(
     *     title="release",
     *     description="Дата выхода альбома",
     *     format="date",
     *     example="1992-01-20"
     * )
     *
     * @var string
     */
    private $release;
     /**
     * @OA\Property(
     *     title="author_id",
     *     description="Автор альбома",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $author_id;
   
}
