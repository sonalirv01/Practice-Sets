<?php

declare(strict_types=1);

/*
Description:
- Runs all algorithm demo files in this folder except itself.

When to Use:
- You want one command to verify all examples quickly.

Run:
- php algorithms/run_all.php
*/

$files = glob(__DIR__ . DIRECTORY_SEPARATOR . '*.php') ?: [];
sort($files);

foreach ($files as $file) {
    if (basename($file) === 'run_all.php') {
        continue;
    }

    echo '--- Running ' . basename($file) . ' ---' . PHP_EOL;
    passthru('php ' . escapeshellarg($file));
    echo PHP_EOL;
}
