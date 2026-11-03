# PHP AI SDK — Vercel AI Gateway

Text generation, streaming, and tool calling through Vercel AI Gateway. Part of the framework-agnostic [PHP AI SDK](https://phpaisdk.com).

## Installation

```bash
composer require aisdk/vercel
```

Set `AI_GATEWAY_API_KEY` in your environment.

## Usage

```php
use AiSdk\Generate;
use AiSdk\Vercel;

$result = Generate::text('Explain closures in PHP in one sentence.')
    ->model(Vercel::model('anthropic/claude-sonnet-5.5'))
    ->run();

echo $result->text;
```

## Documentation

[Read the documentation](https://phpaisdk.com/docs/0.x/providers/vercel) for configuration, supported features, and more examples.

[Contributing](https://github.com/phpaisdk/.github/blob/main/CONTRIBUTING.md) · [Support](https://github.com/phpaisdk/.github/blob/main/SUPPORT.md)

## License

The MIT License (MIT). See [LICENSE](https://github.com/phpaisdk/core/blob/main/LICENSE) for details.
