<?php

namespace Zenstruck\BackupBundle\Tests\Command;

use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Symfony\Component\Console\Tester\CommandTester;
use Zenstruck\Backup\Console\Command\ProfileActionCommand;
use Zenstruck\Backup\Executor;
use Zenstruck\Backup\ProfileRegistry;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class ProfileActionCommandTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_execute(): void
    {
        $this->expectExceptionMessage('No profiles configured.');
        $this->expectException(\RuntimeException::class);

        $tester = new CommandTester($this->createCommand(new ProfileRegistry(), new Executor(new NullLogger())));
        $tester->execute([]);
    }

    abstract protected function createCommand(ProfileRegistry $registry, Executor $executor): ProfileActionCommand;

    abstract protected function getCommandName(): string;
}
