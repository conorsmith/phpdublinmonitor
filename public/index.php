<?php
declare(strict_types=1);

$application = require_once __DIR__ . "/../bootstrap.php";

$action = $application->make(\ConorSmith\PhpDublinMonitor\Web\DisplayWebsiteStatusAction::class);

$action();
