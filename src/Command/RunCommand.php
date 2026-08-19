<?php

namespace Zenstruck\BackupBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Zenstruck\Backup\Console\Command\RunCommand as BaseRunCommand;
use Zenstruck\Backup\Console\Helper\BackupHelper;
use Zenstruck\Backup\Executor;
use Zenstruck\Backup\ProfileRegistry;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
#[AsCommand('zenstruck:backup:run')]
class RunCommand extends BaseRunCommand
{
    public function __construct(
        private readonly ProfileRegistry $profileRegistry,
        private readonly Executor $executor,
    ) {
        parent::__construct();
    }

    protected function getBackupHelper(): BackupHelper
    {
        return new BackupHelper($this->profileRegistry, $this->executor);
    }
}
