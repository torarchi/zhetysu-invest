<?php

namespace App\Http\Controllers\Swagger\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *      path="/api/register",
 *      tags={"Authentication"},
 *      summary="Регистрация",
 *      description="Регистрирует нового пользователя.",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"name", "email", "password"},
 *              @OA\Property(property="name", type="string", example="John Doe"),
 *              @OA\Property(property="email", type="string", format="email", example="john@example.com"),
 *              @OA\Property(property="password", type="string", format="password", example="password123"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Пользователь успешно зарегистрирован",
 *          @OA\JsonContent(
 *              @OA\Property(property="token", type="string", description="Access token"),
 *              @OA\Property(property="user", type="object", description="Registered user details",
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="name", type="string", example="John Doe"),
 *                  @OA\Property(property="email", type="string", format="email", example="john@example.com"),
 *                  @OA\Property(property="created_at", type="string", format="date-time"),
 *                  @OA\Property(property="updated_at", type="string", format="date-time"),
 *                  @OA\Property(property="role_id", type="integer", example=1),
 *              ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Ошибка регистрации",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error message"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Validation error",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", description="The given data was invalid."),
 *              @OA\Property(property="errors", type="object", description="Validation errors",
 *                  @OA\Property(property="email", type="array", @OA\Items(type="string")),
 *              ),
 *          ),
 *      ),
 * )
 */
class RegisterController extends Controller
{

}
