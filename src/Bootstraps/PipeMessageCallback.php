<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Bootstraps;

use Illuminate\Contracts\Events\Dispatcher;
use PeibinLaravel\SwooleEvent\Events\OnPipeMessage;
use Swoole\Server as SwooleServer;

class PipeMessageCallback
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }

    public function onPipeMessage(SwooleServer $server, int $fromWorkerId, $data): void
    {
        $this->dispatcher->dispatch(new OnPipeMessage($server, $fromWorkerId, $data));
    }
}
