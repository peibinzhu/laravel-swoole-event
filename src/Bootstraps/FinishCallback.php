<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnFinish;
use Swoole\Server;

class FinishCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onFinish(Server $server, int $taskId, $data): void
    {
        $this->dispatcher->dispatch(new OnFinish($server, $taskId, $data));
    }
}
