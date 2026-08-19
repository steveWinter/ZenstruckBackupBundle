<?php

namespace Zenstruck\BackupBundle\Tests\Command;

use Zenstruck\Backup\Executor;
use Zenstruck\Backup\ProfileRegistry;
use Zenstruck\BackupBundle\Command\RunCommand;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class RunCommandTest extends ProfileActionCommandTest
{
    protected function createCommand(ProfileRegistry $registry, Executor $executor): RunCommand
    {
        return new RunCommand($registry, $executor);
    }

    protected function getCommandName(): string
    {
        return 'zenstruck:backup:run';
    }
}
