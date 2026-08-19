<?php

namespace Zenstruck\BackupBundle\Tests\Command;

use Zenstruck\Backup\Console\Command\ProfileActionCommand;
use Zenstruck\Backup\Executor;
use Zenstruck\Backup\ProfileRegistry;
use Zenstruck\BackupBundle\Command\ListCommand;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ListCommandTest extends ProfileActionCommandTest
{
    protected function createCommand(ProfileRegistry $registry, Executor $executor): ListCommand|ProfileActionCommand
    {
        return new ListCommand($registry, $executor);
    }

    protected function getCommandName(): string
    {
        return 'zenstruck:backup:list';
    }
}
