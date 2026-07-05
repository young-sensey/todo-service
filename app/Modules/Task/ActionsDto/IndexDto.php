<?php

declare(strict_types=1);

namespace App\Modules\Task\ActionsDto;

final readonly class IndexDto
{
    public function __construct(
        public int      $page,
        public array    $filter,
    ) {}
}
