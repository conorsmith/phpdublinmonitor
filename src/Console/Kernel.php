<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use Symfony\Component\Console\Application;

class Kernel
{
    public function handle(): void
    {
        $delegateKernel = new Application;

        $delegateKernel->run();
    }
}
