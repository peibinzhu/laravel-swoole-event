<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnManagerStart;
use Swoole\Server as SwooleServer;

class ManagerStartCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onManagerStart(SwooleServer $server): void
    {
        $this->dispatcher->dispatch(new OnManagerStart($server));
    }
}
