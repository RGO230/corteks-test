<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     title="Author",
 *     description="Author model",
 *     @OA\Xml(
 *         name="Author"
 *     )
 * )
 */
class Author extends Model
{
     /**
     * @OA\Property(
     *     title="initials",
     *     description="Название альбома",
     *     format="string",
     *     example="Joe Cocker"
     * )
     *
     * @var string
     */
    private $initials;

    use HasFactory;
    protected $fillable = ['initials'];
    public function albums(){
        return $this->hasMany(Album::class);
    }
}