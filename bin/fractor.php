<?php

declare(strict_types=1);

use a9f\Fractor\Configuration\ConfigResolver;
use a9f\Fractor\Console\Application\FractorApplication;
use a9f\Fractor\DependencyInjection\ContainerContainerBuilder;
use Symfony\Component\Console\Input\ArgvInput;

$autoloadFile = (static function (): ?string {
    $candidates = [
        getcwd() . '/vendor/autoload.php',
        __DIR__ . '/../../../autoload.php',
        __DIR__ . '/../vendor/autoload.php',
    ];
    foreach ($candidates as $candidate) {
        if (file_exists($candidate)) {
            return $candidate;
        }
    }
    return null;
})();
if ($autoloadFile === null) {
    echo 'Could not find autoload.php file';
    exit(1);
}
include $autoloadFile;

$configFile = ConfigResolver::resolveConfigsFromInput(new ArgvInput());

$container = (new ContainerContainerBuilder())->createDependencyInjectionContainer($configFile);

/** @var FractorApplication $application */
$application = $container->get(FractorApplication::class);
exit($application->run());
