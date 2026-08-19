<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Reference;
use Zenstruck\Backup\Executor;
use Zenstruck\Backup\Profile;
use Zenstruck\Backup\ProfileBuilder;
use Zenstruck\Backup\ProfileRegistry;
use Zenstruck\BackupBundle\Command\ListCommand;
use Zenstruck\BackupBundle\Command\RunCommand;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('zenstruck_backup.command.list', ListCommand::class)
        ->args([new Reference('zenstruck_backup.profile_registry'), new Reference('zenstruck_backup.executor')])
        ->tag('console.command');

    $services->set('zenstruck_backup.command.run', RunCommand::class)
        ->args([new Reference('zenstruck_backup.profile_registry'), new Reference('zenstruck_backup.executor')])
        ->tag('console.command');

    $services->set('zenstruck_backup.profile_registry', ProfileRegistry::class)
        ->public();

    $services->set('zenstruck_backup.profile_builder', ProfileBuilder::class);

    $services->set('zenstruck_backup.executor', Executor::class)
        ->public()
        ->args([new Reference('logger')])
        ->tag('monolog.logger', ['channel' => 'backup']);

    $services->set('zenstruck_backup.abstract_profile', Profile::class)
        ->abstract()
        ->args([null, null, null, null, [], []]);
};
