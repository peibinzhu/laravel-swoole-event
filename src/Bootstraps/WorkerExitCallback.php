<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnWorkerExit;
use Swoole\Server;

class WorkerExitCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onWorkerExit(Server $server, int $workerId): void
    {
        $this->dispatcher->dispatch(new OnWorkerExit($server, $workerId));
    }
}
