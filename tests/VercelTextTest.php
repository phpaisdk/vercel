<?php

declare(strict_types=1);
use AiSdk\Generate;
use AiSdk\Support\Sdk;
use AiSdk\Vercel;
use AiSdk\Vercel\Tests\Fakes\FakeHttpClient;
use Nyholm\Psr7\Factory\Psr17Factory;

afterEach(function (): void {
    Generate::reset();
    Vercel::reset();
});
it('uses Vercel AI Gateway chat completions', function (): void {
    $client = new FakeHttpClient(200, json_encode(['id' => 'vercel-chat', 'model' => 'anthropic/claude-sonnet-4.5', 'choices' => [['message' => ['content' => 'Hello from Vercel'], 'finish_reason' => 'stop']], 'usage' => ['prompt_tokens' => 3, 'completion_tokens' => 4]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    Vercel::create(['apiKey' => 'gateway-test']);
    $result = Generate::text('Hi')->model(Vercel::model('anthropic/claude-sonnet-4.5'))->run();
    expect($result->text)->toBe('Hello from Vercel')->and((string) $client->lastRequest?->getUri())->toBe('https://ai-gateway.vercel.sh/v1/chat/completions')->and($client->lastRequest?->getHeaderLine('Authorization'))->toBe('Bearer gateway-test')->and($client->sentBody()['model'])->toBe('anthropic/claude-sonnet-4.5');
});
it('accepts opaque Vercel model identifiers', function (): void {
    Vercel::create(['apiKey' => 'gateway-test']);
    expect(Vercel::model('provider/private-model')->modelId())->toBe('provider/private-model');
});
