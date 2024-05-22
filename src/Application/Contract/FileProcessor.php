<?php

declare(strict_types=1);

namespace a9f\Fractor\Application\Contract;

use a9f\Fractor\Application\ValueObject\File;

interface FileProcessor
{
    public function canHandle(File $file): bool;

    public function handle(File $file): void;

    /**
     * @return list<non-empty-string>
     */
    public function allowedFileExtensions(): array;
}
