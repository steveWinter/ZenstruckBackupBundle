<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Destination\AwsCliS3DestinationFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Destination\FlysystemDestinationFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Destination\S3CmdDestinationFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Destination\StreamDestinationFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Namer\SimpleNamerFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Namer\TimestampNamerFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Processor\GzipArchiveProcessorFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Processor\ZipArchiveProcessorFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Source\MySqlDumpSourceFactory;
use Zenstruck\BackupBundle\DependencyInjection\Factory\Source\RsyncSourceFactory;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('zenstruck_backup.source_factory.mysqldump', MySqlDumpSourceFactory::class)
        ->tag('zenstruck_backup.source_factory');

    $services->set('zenstruck_backup.source_factory.rsync', RsyncSourceFactory::class)
        ->tag('zenstruck_backup.source_factory');

    $services->set('zenstruck_backup.namer_factory.simple', SimpleNamerFactory::class)
        ->tag('zenstruck_backup.namer_factory');

    $services->set('zenstruck_backup.namer_factory.timestamp', TimestampNamerFactory::class)
        ->tag('zenstruck_backup.namer_factory');

    $services->set('zenstruck_backup.processor_factory.zip', ZipArchiveProcessorFactory::class)
        ->tag('zenstruck_backup.processor_factory');

    $services->set('zenstruck_backup.processor_factory.gzip', GzipArchiveProcessorFactory::class)
        ->tag('zenstruck_backup.processor_factory');

    $services->set('zenstruck_backup.destination_factory.stream', StreamDestinationFactory::class)
        ->tag('zenstruck_backup.destination_factory');

    $services->set('zenstruck_backup.destination_factory.flysystem', FlysystemDestinationFactory::class)
        ->tag('zenstruck_backup.destination_factory');

    $services->set('zenstruck_backup.destination_factory.s3cmd', S3CmdDestinationFactory::class)
        ->tag('zenstruck_backup.destination_factory');

    $services->set('zenstruck_backup.destination_factory.aws_cli_s3', AwsCliS3DestinationFactory::class)
        ->tag('zenstruck_backup.destination_factory');
};
