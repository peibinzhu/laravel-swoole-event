<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Events;

use Swoole\Server;

class OnReceive
{
    public function __construct(public Server $server, public int $fd, public int $reactorId, public mixed $data)
    {
    }
}
