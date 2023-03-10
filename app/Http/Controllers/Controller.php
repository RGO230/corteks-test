<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API",
 *      description="Документация сервиса.",
 *      
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )
 *
 * @OA\Tag(
 *     name="Track",
 *     description="Песни"
 * )
 * @OA\Tag(
 *     name="Album",
 *     description="Альбомы"
 * )
 * @OA\Tag(
 *     name="Author",
 *     description="Исполнители"
 * )
 * @OA\Tag(
 *     name="Order",
 *     description="Получение порядквого номера трека в альбоме"
 * )
 * 
 */
class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
