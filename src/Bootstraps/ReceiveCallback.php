<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnReceive;
use Swoole\Server;

class ReceiveCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onReceive(Server $server, int $fd, int $reactorId, $data): void
    {
        $this->dispatcher->dispatch(new OnReceive($server, $fd, $reactorId, $data));
    }
}
