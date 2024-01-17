<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SendMessageRequest;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Queue;

class MailController extends Controller
{
    public function sendMessage(SendMessageRequest $request)
    {
        SendEmailJob::dispatch($request->all())->onQueue('email');

        return response()->json(['message' => 'Message sent to the queue']);
    }
}
