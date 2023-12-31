<?php

namespace Jumamiller\LaravelQueryOptimizer\Http;

use OpenAI\Laravel\Facades\OpenAI;

class Client
{
    public function optimizeRequest(string $prompt, float $temperature = 0.0, int $maxTokens = 500): string
    {
        return OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => $temperature,
            'max_tokens' => $maxTokens,
        ])['choices'][0]['text'];
    }
}
