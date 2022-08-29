<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnWorkerError;
use Swoole\Server;

class WorkerErrorCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onWorkerError(Server $server, int $workerId, int $workerPid, int $exitCode, int $signal): void
    {
        $this->dispatcher->dispatch(new OnWorkerError($server, $workerId, $workerPid, $exitCode, $signal));
    }
}
