<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 *      path="/api/news",
 *      summary="Get a list of news articles",
 *      tags={"News"},
 *      description="Retrieve a paginated list of news articles.",
 *      @OA\Response(
 *          response=200,
 *          description="Successful response with a list of news articles.",
 *          @OA\JsonContent(
 *              @OA\Property(property="current_page", type="integer"),
 *              @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/NewsItem")),
 *          ),
 *      ),
 * )
 * @OA\Get(
 *      path="/api/news/{id}",
 *      summary="Get a specific news article",
 *      tags={"News"},
 *      description="Retrieve details of a specific news article by ID.",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the news article",
 *          required=true,
 *          @OA\Schema(type="integer"),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful response with the details of the news article.",
 *          @OA\JsonContent(ref="#/components/schemas/NewsItem"),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="News not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error message"),
 *          ),
 *      ),
 * )
 * @OA\Post(
 *      path="/api/news",
 *      summary="Create a new news article",
 *      tags={"News"},
 *      description="Create a new news article with the provided data.",
 *      security={{ "passport": {} }},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/NewsItem"),
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Successful response with the created news article.",
 *          @OA\JsonContent(ref="#/components/schemas/NewsItem"),
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error message"),
 *          ),
 *      ),
 * )
 * @OA\Put(
 *      path="/api/news/{id}",
 *      summary="Update a news article",
 *      tags={"News"},
 *      description="Update a news article with the provided data.",
 *      security={{ "passport": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the news article",
 *          required=true,
 *          @OA\Schema(type="integer"),
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/NewsItem"),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful response with the updated news article.",
 *          @OA\JsonContent(ref="#/components/schemas/NewsItem"),
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error message"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="News not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error message"),
 *          ),
 *      ),
 * )
 * @OA\Delete(
 *      path="/api/news/{id}",
 *      summary="Delete a news article",
 *      tags={"News"},
 *      description="Delete a news article by ID.",
 *      security={{ "passport": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the news article",
 *          required=true,
 *          @OA\Schema(type="integer"),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful response with a message.",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", description="Success message"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error message"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="News not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error message"),
 *          ),
 *      ),
 * )
 * @OA\Schema(
 *     schema="NewsItem",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="image_path", type="string"),
 *     @OA\Property(property="category_id", type="integer"),
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 * )
 * 
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     name="passport",
 *     securityScheme="passport",
 *     @OA\Flow(
 *         flow="password",
 *         tokenUrl="/oauth/token",
 *         scopes={}
 *     ),
 * )
 */

class NewsController extends Controller
{

}
