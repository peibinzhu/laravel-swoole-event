<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnWorkerStop;
use Swoole\Server;

class WorkerStopCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onWorkerStop(Server $server, int $workerId): void
    {
        $this->dispatcher->dispatch(new OnWorkerStop($server, $workerId));
    }
}
