<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Events;

use Swoole\Server;

class OnWorkerStop
{
    public function __construct(public Server $server, public int $workerId)
    {
    }
}
