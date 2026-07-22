<?php

declare(strict_types=1);

namespace AiSdk\Vercel;

use AiSdk\Contracts\BaseProvider;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\Contracts\TextProviderInterface;
use AiSdk\Vercel\Models\VercelTextModel;

final class VercelProvider extends BaseProvider implements TextProviderInterface
{
    public function __construct(public readonly VercelOptions $options) {}
    public function name(): string
    {
        return VercelOptions::PROVIDER_NAME;
    }
    protected function textModel(string $modelId): TextModelInterface
    {
        return new VercelTextModel($modelId, $this->options);
    }
}
