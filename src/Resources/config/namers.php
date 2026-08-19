<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Zenstruck\Backup\Namer\SimpleNamer;
use Zenstruck\Backup\Namer\TimestampNamer;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('zenstruck_backup.namer.abstract_simple', SimpleNamer::class)
        ->abstract()
        ->args([null]);

    $services->set('zenstruck_backup.namer.abstract_timestamp', TimestampNamer::class)
        ->abstract()
        ->args([null, null, null, null]);
};
