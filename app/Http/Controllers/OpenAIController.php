<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\View\View;

class OpenAIController extends Controller
{
    public function index(Request $request)
    {

        $messages = collect(session('messages', []))->reject(fn ($message) => $message['role'] === 'system');

        return view('welcome', [
            'messages' => $messages
        ]);
    }
    public function send(Request $request)
    {

        $messages = collect(session('messages', []))->reject(fn ($message) => $message['role'] === 'system');
        if (count($messages) == 0) {
            $messages[] = $request->session()->get(
                'messages',
                ['role' => 'system', 'content' => 'You are Mansur AI - I am Mansur AI. Answer as concisely as possible.']
            );
        } else {
            $messages = $request->session()->get(
                'messages',
                ['role' => 'system', 'content' => 'You are Mansur AI - I am Mansur AI. Answer as concisely as possible.']
            );
        };

        $messages[] = ['role' => 'user', 'content' => $request->input('message')];

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages
        ]);

        $messages[] = ['role' => 'assistant', 'content' => $response->choices[0]->message->content];


        $request->session()->put('messages', $messages);

        return redirect('/openai/send');
    }

    public function reset(Request $request)
    {

        $request->session()->forget('messages');
        return redirect('/openai/send');
    }
};
