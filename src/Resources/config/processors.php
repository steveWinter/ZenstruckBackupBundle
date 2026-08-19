<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Zenstruck\Backup\Processor\GzipArchiveProcessor;
use Zenstruck\Backup\Processor\ZipArchiveProcessor;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('zenstruck_backup.processor.abstract_zip', ZipArchiveProcessor::class)
        ->abstract()
        ->args([null, [], null]);

    $services->set('zenstruck_backup.processor.abstract_gzip', GzipArchiveProcessor::class)
        ->abstract()
        ->args([null, [], null]);
};
