<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Zenstruck\Backup\Source\MySqlDumpSource;
use Zenstruck\Backup\Source\RsyncSource;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('zenstruck_backup.source.abstract_mysqldump', MySqlDumpSource::class)
        ->abstract()
        ->args([null, null, null, null, null, null, null, null, null]);

    $services->set('zenstruck_backup.source.abstract_rsync', RsyncSource::class)
        ->abstract()
        ->args([null, null, [], [], null]);
};
