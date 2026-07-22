# aisdk/vercel

<a href="https://github.com/phpaisdk/vercel/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/phpaisdk/vercel/tests.yml?branch=main&label=Tests"></a>
<a href="https://packagist.org/packages/aisdk/vercel"><img alt="Latest Version" src="https://img.shields.io/packagist/v/aisdk/vercel"></a>
<a href="https://packagist.org/packages/aisdk/vercel"><img alt="License" src="https://img.shields.io/packagist/l/aisdk/vercel"></a>

------

Official Vercel AI Gateway provider for the PHP AI SDK. Uses Vercel's OpenAI-compatible Chat Completions API.

## Installation

```bash
composer require aisdk/vercel
```

## Basic Usage

```php
use AiSdk\Generate;
use AiSdk\Vercel;

Vercel::create(['apiKey' => $_ENV['AI_GATEWAY_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Vercel::model('anthropic/claude-sonnet-4.5'))
    ->run();
```

## Configuration

| Variable | Description | Default |
| --- | --- | --- |
| `AI_GATEWAY_API_KEY` | Vercel AI Gateway API key | Required |
| `VERCEL_BASE_URL` | Base URL for API requests | `https://ai-gateway.vercel.sh/v1` |

## Supported Capabilities

| Capability | Support |
| --- | --- |
| Text generation and streaming | Native OpenAI-compatible chat |
| Tool calling, structured output, reasoning | Passed through for selected gateway models |
| Image input | Passed through for compatible gateway models |

## Provider Options

Use `providerOptions('vercel', ['raw' => [...]])` for documented AI Gateway fields outside the portable SDK surface. Model IDs use Vercel's `provider/model` form and remain opaque strings.

## Documentation

- [Vercel AI Gateway documentation](https://vercel.com/docs/ai-gateway)
- [PHP AI SDK documentation](https://phpaisdk.com/docs/vercel)
