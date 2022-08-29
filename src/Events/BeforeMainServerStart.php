<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Events;

use Swoole\Server;

class BeforeMainServerStart
{
    public function __construct(public Server $server, public array $serverConfig)
    {
    }
}
