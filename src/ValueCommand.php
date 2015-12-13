<?php

namespace PiPHP\PiPin;

use PiPHP\GPIO\PinInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ValueCommand extends AbstractPinCommand
{
    const PIN_VALUE_ARGUMENT = 'value';

    public function __construct()
    {
        parent::__construct('value', 'Read or write the pin value');

        $this->addArgument(self::PIN_VALUE_ARGUMENT, InputArgument::OPTIONAL, 'Optional value to write to the pin');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pin = $this->getPin($input);

        $value = $input->getArgument(self::PIN_VALUE_ARGUMENT);

        if (null !== $value) {
            $validValues = [PinInterface::VALUE_HIGH, PinInterface::VALUE_LOW];

            if (!in_array($value, $validValues)) {
                throw new \InvalidArgumentException('Value must be one of: ' . implode(', ', $validValues));
            }

            $pin->setValue($value);
        } else {
            $output->write($pin->getValue());
        }
    }
}
