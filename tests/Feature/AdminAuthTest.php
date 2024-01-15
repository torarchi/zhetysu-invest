<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan; 

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
{
    parent::setUp();

    Artisan::call('passport:install');
}
    
    public function test_admin_can_login()
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'admin@example.com',
            'password' => 'adminpassword',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token', 'user']);

        $this->assertAuthenticated(); 
        $this->assertAuthenticatedAs($admin); 
    }

    public function test_invalid_credentials_return_error()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'invalidpassword',
        ]);

        $response->assertStatus(401)
            ->assertJson(['error' => 'Неверные данные']);

        $this->assertGuest();
    }
}
