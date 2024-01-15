<?php

namespace App\Http\Controllers\Swagger\Admin_Estate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 *      path="/api/products",
 *      tags={"Products"},
 *      summary="Get all products",
 *      description="Get a list of all products",
 *      security={{ "passport": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(ref="#/components/schemas/Product"),
 *          ),
 *      ),
 * )
 * @OA\Post(
 *      path="/api/products",
 *      tags={"Products"},
 *      summary="Create a new product",
 *      description="Create a new product",
 *      security={{ "passport": {} }},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/ProductRequest"),
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Product created successfully",
 *          @OA\JsonContent(ref="#/components/schemas/Product"),
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
 *      path="/api/products/{id}",
 *      tags={"Products"},
 *      summary="Get a specific product",
 *      description="Get details of a specific product",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Product ID",
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/Product"),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Product not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Product not found"),
 *          ),
 *      ),
 * )
 * @OA\Put(
 *      path="/api/products/{id}",
 *      tags={"Products"},
 *      summary="Update a product",
 *      description="Update details of a specific product",
 *      security={{ "passport": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Product ID",
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/ProductRequest"),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product updated successfully",
 *          @OA\JsonContent(ref="#/components/schemas/Product"),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Product not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Product not found"),
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
 *      path="/api/products/{id}",
 *      tags={"Products"},
 *      summary="Delete a product",
 *      description="Delete a specific product",
 *      security={{ "passport": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Product ID",
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product deleted successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", description="Product deleted successfully"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Product not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", description="Product not found"),
 *          ),
 *      ),
 * )
 * @OA\Get(
 *      path="/api/products/publicIndex",
 *      tags={"Products"},
 *      summary="Get public index of products",
 *      description="Get a list of products for the public index",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"category_id"},
 *              @OA\Property(property="category_id", type="integer"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="sub_categories", type="array", @OA\Items(ref="#/components/schemas/Category")),
 *              @OA\Property(property="products", type="array", @OA\Items(ref="#/components/schemas/Product")),
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
 * 
 * @OA\Schema(
 *     schema="ProductRequest",
 *     @OA\Property(property="name", type="string"),
 * )
 * 
 * @OA\Schema(
 *     schema="Product",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 * )
 * 
 */

class ProductController extends Controller
{
    
}
