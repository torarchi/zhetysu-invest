<?php

namespace Tests\Feature\Http\Controllers\Mail;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use App\Http\Requests\Mail\SendMessageRequest;
use App\Jobs\SendEmailJob;
use App\Models\User;

class MailControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSendMessageQueuesJob()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '123456789',
            'message' => 'Hello, this is a test message.',
        ];
    
        $response = $this->postJson('/api/send-message', $data);
    
        $response->assertStatus(200)->assertJson(['message' => 'Message sent to the queue']);

        $job = new SendEmailJob($data);
        $job->handle();
    }
    

    public function testSendMessageValidation()
    {
        $data = [
            'name' => 123,
            'email' => '1john.doe1example.com',
            'phone' => 2,
            'message' => 3,
        ];
    
        $response = $this->postJson('/api/send-message', $data);
    
        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'name', 'email', 'phone', 'message',
                 ]);
    }
}
