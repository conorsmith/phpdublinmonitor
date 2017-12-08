<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

class Kernel
{
    /** @var DisplayWebsiteStatusAction */
    private $action;

    public function __construct(DisplayWebsiteStatusAction $action)
    {
        $this->action = $action;
    }

    public function handle(): void
    {
        $this->action->__invoke();
    }
}
