<?php

namespace PiPHP\PiPin;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ExportCommand extends AbstractPinCommand
{
    public function __construct()
    {
        parent::__construct('export', 'Export a pin');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getPin($input)->export();
    }
}
