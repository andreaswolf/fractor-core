<?php

declare(strict_types=1);

namespace a9f\Fractor\Console\Output;

use a9f\Fractor\Console\Contract\Output;

final class NullOutput implements Output
{
    public function progressStart(int $max = 0): void
    {
    }

    public function progressAdvance(int $step = 1): void
    {
    }

    public function progressFinish(): void
    {
    }

    public function write(string $message): void
    {
    }

    public function listing(array $lines): void
    {
    }

    public function newLine(): void
    {
    }
}
