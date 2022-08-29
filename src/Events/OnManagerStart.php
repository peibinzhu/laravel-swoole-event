<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Events;

use Swoole\Server;

class OnManagerStart
{
    public function __construct(public Server $server)
    {
    }
}