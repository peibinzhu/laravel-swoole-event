<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnShutdown;
use Swoole\Server;

class ShutdownCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onShutdown(Server $server): void
    {
        $this->dispatcher->dispatch(new OnShutdown($server));
    }
}
