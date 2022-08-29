<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Events;

class BeforeServerStart
{
    public function __construct(public string $serverName)
    {
    }
}
