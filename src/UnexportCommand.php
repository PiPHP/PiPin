<?php

namespace PiPHP\PiPin;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class UnexportCommand extends AbstractPinCommand
{
    public function __construct()
    {
        parent::__construct('unexport', 'Unexport a pin');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getPin($input)->unexport();
    }
}
