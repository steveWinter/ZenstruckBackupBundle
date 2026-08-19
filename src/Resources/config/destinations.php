<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Zenstruck\Backup\Destination\AwsCliS3Destination;
use Zenstruck\Backup\Destination\FlysystemDestination;
use Zenstruck\Backup\Destination\S3CmdDestination;
use Zenstruck\Backup\Destination\StreamDestination;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('zenstruck_backup.destination.abstract_stream', StreamDestination::class)
        ->abstract()
        ->args([null, null]);

    $services->set('zenstruck_backup.destination.abstract_flysystem', FlysystemDestination::class)
        ->abstract()
        ->args([null, null]);

    $services->set('zenstruck_backup.destination.abstract_s3cmd', S3CmdDestination::class)
        ->abstract()
        ->args([null, null, null, []]);

    $services->set('zenstruck_backup.destination.abstract_aws_cli_s3', AwsCliS3Destination::class)
        ->abstract()
        ->args([null, null, null, []]);
};
