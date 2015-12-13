<?php

namespace PiPHP\PiPin;

use PiPHP\GPIO\PinInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class EdgeCommand extends AbstractPinCommand
{
    const PIN_EDGE_ARGUMENT = 'edge';

    public function __construct()
    {
        parent::__construct('edge', 'Read or write the pin edge value');

        $this->addArgument(self::PIN_EDGE_ARGUMENT, InputArgument::OPTIONAL, 'Optional edge value to write to the pin');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pin = $this->getPin($input);

        $edge = $input->getArgument(self::PIN_EDGE_ARGUMENT);

        if (null !== $edge) {
            $validEdges = [PinInterface::EDGE_BOTH, PinInterface::EDGE_RISING, PinInterface::EDGE_FALLING, PinInterface::EDGE_NONE];

            if (!in_array($edge, $validEdges)) {
                throw new \InvalidArgumentException('Edge value must be one of: ' . implode(', ', $validEdges));
            }

            $pin->setEdge($edge);
        } else {
            $output->writeln($pin->getEdge());
        }
    }
}
