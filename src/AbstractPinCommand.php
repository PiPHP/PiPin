<?php

namespace PiPHP\PiPin;

use PiPHP\GPIO\PinFactory;
use PiPHP\GPIO\PinFactoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;

abstract class AbstractPinCommand extends Command
{
    const PIN_NUMBER_ARGUMENT = 'pin';

    /**
     * @var string
     */
    private $description;

    /**
     * @var PinFactoryInterface
     */
    private $pinFactory;

    /**
     * Constructor.
     * 
     * @param string              $name
     * @param string              $description
     * @param PinFactoryInterface $pinFactory
     */
    public function __construct($name, $description, PinFactoryInterface $pinFactory = null)
    {
        $this->description = $description;
        $this->pinFactory = $pinFactory ?: new PinFactory();

        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setDescription($this->description)
            ->addArgument(self::PIN_NUMBER_ARGUMENT, InputArgument::REQUIRED, 'The GPIO pin');
    }

    protected function getPin(InputInterface $input)
    {
        $pinNumber = (int) $input->getArgument(self::PIN_NUMBER_ARGUMENT);
        return $this->pinFactory->getPin($pinNumber);
    }
}
