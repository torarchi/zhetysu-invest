<?php

namespace Tests\Feature\Http\Controllers\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('passport:install');
    }

    public function test_can_get_all_categories()
    {
        $user = User::factory()->create(['role_id' => 2]); // Admin user
        $token = $user->createToken('AppToken')->accessToken;

        Category::factory()->count(5)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/admin/categories');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'parent_id',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                    ],
                ],
            ]);

    }

    public function test_can_create_category()
    {
        $user = User::factory()->create(['role_id' => 2]); // Admin user
        $token = $user->createToken('AppToken')->accessToken;
    
        $categoryData = Category::factory()->make()->toArray();
    
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/admin/categories', $categoryData);
    
        $response->assertStatus(201)
            ->assertJsonStructure([
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
            ]);
        $this->assertDatabaseHas('categories', $categoryData);
    }

    public function test_can_delete_category()
    {
        $user = User::factory()->create(['role_id' => 2]); // Admin user
        $token = $user->createToken('AppToken')->accessToken;

        $category = Category::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete("/api/admin/categories/{$category->id}");

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertSoftDeleted('categories', ['id' => $category->id]);
    }
}
