<?php

namespace App\Http\Controllers\Swagger\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *      path="/api/login",
 *      tags={"Authentication"},
 *      summary="Логин",
 *      description="Sign in",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"email", "password"},
 *              @OA\Property(property="email", type="string", format="email", example="admin@example.com"),
 *              @OA\Property(property="password", type="string", format="password", example="adminpassword"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="user", type="object", description="User details"),
 *              @OA\Property(property="token", type="string", description="Access token"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Validation error",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error"),
 *          ),
 *      ),
 * ),
 */

class AuthController extends Controller
{
//
}
