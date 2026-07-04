<?php

declare(strict_types=1);

namespace App\Modules\Task\ActionsDto;

final readonly class ShowDto
{
    public function __construct(
        public string $uuid,
    ) {}
}
