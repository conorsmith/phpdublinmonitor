<?php
declare(strict_types=1);

$application = require_once __DIR__ . "/../bootstrap.php";

$kernel = $application->make(\ConorSmith\PhpDublinMonitor\Web\Kernel::class);

$kernel->handle();
