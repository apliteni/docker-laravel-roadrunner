<?php

use Illuminate\Contracts\Console\Kernel;
use Symfony\Component\Console\Output\ConsoleOutput;

$app = require __DIR__ . '/../bootstrap/app.php';

/** @var Kernel $kernel */
$kernel = $app->make(Kernel::class);
/** @var ConsoleOutput $output */
$output = $app->make(ConsoleOutput::class);

$output->write('Refresh migrations..');
$kernel->call('migrate:refresh');
$output->writeln(' Done');

$output->write('Apply seeds..');
$kernel->call('db:seed');
$output->writeln(' Done');
