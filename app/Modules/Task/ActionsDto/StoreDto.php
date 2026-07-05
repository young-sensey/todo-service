<?php

declare(strict_types=1);

namespace App\Modules\Task\ActionsDto;

use Carbon\CarbonImmutable;

final readonly class StoreDto
{
    public function __construct(
        public string $name,
        public string $description,
        public int $complexity,
        public CarbonImmutable $execution_time,
    ) {}
}
