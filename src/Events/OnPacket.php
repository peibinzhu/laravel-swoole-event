<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Events;

use Swoole\Server;

class OnPacket
{
    public function __construct(public Server $server, public string $data, public array $clientInfo)
    {
    }
}
