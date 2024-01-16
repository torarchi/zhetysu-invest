<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class NewsControllerTest extends TestCase
{
    use RefreshDatabase;

    private $adminUser;
    private $regularUser;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate');

        $this->adminUser = User::factory()->create(['role_id' => 2]);
        $this->regularUser = User::factory()->create(['role_id' => 1]);
    }

    public function test_can_get_news()
    {
        $category = Category::factory()->create();
    
        $news = News::factory()->count(3)->create(['category_id' => $category->id]);
    
        $response = $this->get('/api/news');
    
        $response->assertStatus(200);
    
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'image_path',
                    'category_id',
                    'title',
                    'description',
                    'created_at',
                    'updated_at',
                    'news_category',
                ],
            ],
        ]);
    
        foreach ($news as $singleNews) {
            $response->assertJsonFragment([
                'title' => $singleNews->title,
            ]);
        }
    }
    
    public function test_can_get_single_news()
    {
        $category = Category::factory()->create();
        
        $news = News::factory()->create(['category_id' => $category->id]);
        
        $response = $this->get('/api/news/' . $news->id);
        
        $response->assertStatus(200);
        
        $response->assertJsonStructure([
                'id',
                'image_path',
                'category_id',
                'title',
                'description',
                'created_at',
                'updated_at',
                'news_category',
        ]);
    
        $response->assertJson([
                'id' => $news->id,
                'title' => $news->title,
        ]);
    }
    
    public function test_admin_can_create_news()
    {
        $this->actingAs($this->adminUser, 'api');

        $newsData = News::factory()->make()->toArray();

        $response = $this->postJson('/api/admin/news', $newsData);

        $response->assertStatus(201)
            ->assertJsonFragment($newsData);
    }

    public function test_regular_user_cannot_create_news()
    {
        $this->actingAs($this->regularUser, 'api');

        $newsData = News::factory()->make()->toArray();

        $response = $this->postJson('/api/admin/news', $newsData);

        $response->assertStatus(403)
            ->assertJson(['error' => 'Unauthorized']);
    }

    public function test_admin_can_update_news()
    {
        $this->actingAs($this->adminUser, 'api');

        $news = News::factory()->create();

        $updatedData = ['title' => 'Updated Title'];

        $response = $this->putJson("/api/admin/news/{$news->id}", $updatedData);

        $response->assertStatus(200)
            ->assertJsonFragment($updatedData);
    }


    public function test_regular_user_cannot_update_news()
    {
        $user = User::factory()->create(['role_id' => 1]);

        $this->actingAs($user, 'api');

        $news = News::factory()->create();

        $updatedData = ['title' => 'Updated Title'];

        $response = $this->putJson("/api/admin/news/{$news->id}", $updatedData);

        $response->assertStatus(403)
            ->assertJson(['error' => 'Unauthorized']);
    }

    public function test_admin_can_delete_news()
    {
        $this->actingAs($this->adminUser, 'api');
    
        $news = News::factory()->create();
    
        $response = $this->deleteJson("/api/admin/news/{$news->id}");
    
        $response->assertStatus(200)
            ->assertJson(['success' => true]); 
    }

    public function test_regular_user_cannot_delete_news()
    {
        $user = User::factory()->create(['role_id' => 1]);

        $this->actingAs($user, 'api');

        $news = News::factory()->create();

        $response = $this->deleteJson("/api/admin/news/{$news->id}");

        $response->assertStatus(403)
            ->assertJson(['error' => 'Unauthorized']);
    }
}