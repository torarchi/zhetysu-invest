<?php

namespace Tests\Feature\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class ProductControllerTest  extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('passport:install');
    }

    public function test_can_get_all_products()
    {
        $user = User::factory()->create(['role_id' => 2]); // Admin user
        $token = $user->createToken('AppToken')->accessToken;
    
        Product::factory()->count(5)->create();
    
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/admin/products');
    
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'description', 'cover', 'category_id', 'created_at', 'updated_at', 'deleted_at'],
                ],
            ]);
    }

    public function test_can_create_product()
    {
        $user = User::factory()->create(['role_id' => 2]); // Admin user
        $token = $user->createToken('AppToken')->accessToken;

        $productData = Product::factory()->make()->toArray();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/admin/products', $productData);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'name', 'description', 'cover', 'category_id', 'created_at', 'updated_at'])
            ->assertJsonFragment($productData);

        $this->assertDatabaseHas('products', $productData);
    }
    
    public function test_can_delete_product()
    {
        $user = User::factory()->create(['role_id' => 2]); // Admin user
        $token = $user->createToken('AppToken')->accessToken;
    
        $product = Product::factory()->create();
    
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete("/api/admin/products/{$product->id}");
    
        $response->assertStatus(200)
            ->assertJson(['success' => true]);
    
        $this->assertSoftDeleted('products', ['id' => $product->id]);
    }

    /*
    public function test_can_get_public_index()
    {
        $user = User::factory()->create(); // Regular user
        $token = $user->createToken('AppToken')->accessToken;
    
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);
    
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get("/api/products/publicIndex?category_id={$category->id}");
    
        $response->assertStatus(200)
            ->assertJsonStructure([
                'sub_categories' => [
                    '*' => ['id', 'name', 'parent_id', 'created_at', 'updated_at', 'deleted_at'],
                ],
                'products' => [
                    '*' => ['id', 'name', 'description', 'cover', 'category_id', 'created_at', 'updated_at', 'deleted_at'],
                ],
            ]);
    }
    */
    
    public function test_can_get_product_by_id()
    {
        $user = User::factory()->create(); // Regular user
        $token = $user->createToken('AppToken')->accessToken;
    
        $product = Product::factory()->create();
    
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get("/api/products/{$product->id}");
    
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'name', 'description', 'cover', 'category_id', 'created_at', 'updated_at'])
            ->assertJsonFragment($product->toArray());
    }
    
    
    
    
    
}
