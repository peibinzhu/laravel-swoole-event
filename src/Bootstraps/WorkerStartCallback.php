<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\Contracts\StdoutLoggerInterface;
use PeibinLaravel\Coordinator\Constants;
use PeibinLaravel\Coordinator\CoordinatorManager;
use PeibinLaravel\SwooleEvent\Events\AfterWorkerStart;
use PeibinLaravel\SwooleEvent\Events\BeforeWorkerStart;
use PeibinLaravel\SwooleEvent\Events\MainWorkerStart;
use PeibinLaravel\SwooleEvent\Events\OtherWorkerStart;
use Swoole\Server as SwooleServer;

class WorkerStartCallback
{
    public function __construct(protected Dispatcher $dispatcher, protected StdoutLoggerInterface $logger)
    {
    }

    public function onWorkerStart(SwooleServer $server, int $workerId): void
    {
        $this->dispatcher->dispatch(new BeforeWorkerStart($server, $workerId));

        if ($workerId === 0) {
            $this->dispatcher->dispatch(new MainWorkerStart($server, $workerId));
        } else {
            $this->dispatcher->dispatch(new OtherWorkerStart($server, $workerId));
        }

        if ($server->taskworker) {
            $this->logger->info("TaskWorker#{$workerId} started.");
        } else {
            $this->logger->info("Worker#{$workerId} started.");
        }

        $this->dispatcher->dispatch(new AfterWorkerStart($server, $workerId));
        CoordinatorManager::until(Constants::WORKER_START)->resume();
    }
}
