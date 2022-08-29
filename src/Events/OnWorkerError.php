<?php

declare(strict_types=1);

namespace PeibinLaravel\SwooleEvent\Events;

use Swoole\Server;

class OnWorkerError
{
    public function __construct(
        public Server $server,
        public int $workerId,
        public int $workerPid,
        public int $exitCode,
        public int $signal
    ) {
    }
}
