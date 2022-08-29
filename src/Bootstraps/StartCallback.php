<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnStart;
use Swoole\Server as SwooleServer;

class StartCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onStart(SwooleServer $server): void
    {
        $this->dispatcher->dispatch(new OnStart($server));
    }
}
