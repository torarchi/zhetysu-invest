<?php

namespace App\Http\Controllers\Swagger\Admin_Estate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 *      path="/api/categories",
 *      tags={"Categories"},
 *      summary="Get all categories",
 *      description="Get a list of all categories",
 *      security={{ "passport": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(ref="#/components/schemas/Category"),
 *          ),
 *      ),
 * )
 * @OA\Post(
 *      path="/api/categories",
 *      tags={"Categories"},
 *      summary="Create a new category",
 *      description="Create a new category",
 *      security={{ "passport": {} }},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/CategoryRequest"),
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Category created successfully",
 *          @OA\JsonContent(ref="#/components/schemas/Category"),
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Validation error",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error"),
 *          ),
 *      ),
 * )
 * @OA\Get(
 *      path="/api/categories/{id}",
 *      tags={"Categories"},
 *      summary="Get a specific category",
 *      description="Get details of a specific category",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Category ID",
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/Category"),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Category not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Category not found"),
 *          ),
 *      ),
 * )
 * @OA\Put(
 *      path="/api/categories/{id}",
 *      tags={"Categories"},
 *      summary="Update a category",
 *      description="Update details of a specific category",
 *      security={{ "passport": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Category ID",
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/CategoryRequest"),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Category updated successfully",
 *          @OA\JsonContent(ref="#/components/schemas/Category"),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Category not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Category not found"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Validation error",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Error"),
 *          ),
 *      ),
 * )
 * @OA\Delete(
 *      path="/api/categories/{id}",
 *      tags={"Categories"},
 *      summary="Delete a category",
 *      description="Delete a specific category",
 *      security={{ "passport": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Category ID",
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Category deleted successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", description="Category deleted successfully"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Category not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Category not found"),
 *          ),
 *      ),
 * )
 * 
 * @OA\Schema(
 *     schema="CategoryRequest",
 *     @OA\Property(property="name", type="string"),
 * )
 * 
 * @OA\Schema(
 *     schema="Category",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 * )
 */

class CategoryController extends Controller
{
    
}
