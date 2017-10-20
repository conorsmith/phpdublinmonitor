<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use Symfony\Component\Console\Application;

class Kernel
{
    /** @var Application */
    private $delegateKernel;

    public function __construct(Application $delegateKernel)
    {
        $this->delegateKernel = $delegateKernel;
    }

    public function handle(): void
    {
        $this->delegateKernel->run();
    }
}
