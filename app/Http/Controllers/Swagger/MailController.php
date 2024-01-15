<?php

namespace App\Http\Controllers\Swagger;
use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *      path="/api/send-message",
 *      tags={"Mail"},
 *      summary="Send a message",
 *      description="Sends a message to the specified email address.",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"name", "email", "phone", "message"},
 *              @OA\Property(property="name", type="string", example="John Doe"),
 *              @OA\Property(property="email", type="string", format="email", example="john@example.com"),
 *              @OA\Property(property="phone", type="string", example="123456789"),
 *              @OA\Property(property="message", type="string", example="Hello, this is a test message."),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Message sent to the queue",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", description="Success message"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Validation error",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", description="The given data was invalid."),
 *              @OA\Property(property="errors", type="object", description="Validation errors",
 *                  @OA\Property(property="name", type="array", @OA\Items(type="string")),
 *                  @OA\Property(property="email", type="array", @OA\Items(type="string")),
 *                  @OA\Property(property="phone", type="array", @OA\Items(type="string")),
 *                  @OA\Property(property="message", type="array", @OA\Items(type="string")),
 *              ),
 *          ),
 *      ),
 * )
 */
class MailController extends Controller
{

}
