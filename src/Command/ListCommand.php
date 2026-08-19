<?php

namespace Zenstruck\BackupBundle\Command;

use Zenstruck\Backup\Console\Command\ListCommand as BaseListCommand;
use Zenstruck\Backup\Console\Helper\BackupHelper;
use Zenstruck\Backup\Executor;
use Zenstruck\Backup\ProfileRegistry;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ListCommand extends BaseListCommand
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
