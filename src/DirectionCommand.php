<?php

namespace PiPHP\PiPin;

use PiPHP\GPIO\PinInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class DirectionCommand extends AbstractPinCommand
{
    const PIN_DIRECTION_ARGUMENT = 'direction';

    public function __construct()
    {
        parent::__construct('direction', 'Read or write the pin direction value');

        $this->addArgument(self::PIN_DIRECTION_ARGUMENT, InputArgument::OPTIONAL, 'Optional direction value to write to the pin');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pin = $this->getPin($input);

        $direction = $input->getArgument(self::PIN_DIRECTION_ARGUMENT);

        if (null !== $direction) {
            $validDirections = [PinInterface::DIRECTION_IN, PinInterface::DIRECTION_OUT];

            if (!in_array($direction, $validDirections)) {
                throw new \InvalidArgumentException('Direction value must be one of: ' . implode(', ', $validDirections));
            }

            $pin->setDirection($direction);
        } else {
            $output->writeln($pin->getDirection());
        }
    }
}
