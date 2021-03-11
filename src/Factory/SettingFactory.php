<?php

namespace Mailery\Setting\Factory;

use Mailery\Setting\Model\SettingInterface;
use Mailery\Setting\Factory\SettingFactoryInterface;
use InvalidArgumentException;

class SettingFactory implements SettingFactoryInterface
{
    /**
     * @var string
     */
    private string $class;

    /**
     * @param string $class
     * @throws InvalidArgumentException
     */
    public function __construct(string $class)
    {
        if (!is_subclass_of($class, SettingInterface::class)) {
            throw new InvalidArgumentException(sprintf(
                'Class "%s" does not implement "%s".',
                $class,
                SettingInterface::class,
            ));
        }

        $this->class = $class;
    }

    /**
     * @param array $config
     * @return SettingInterface
     */
    public function create(array $config): SettingInterface
    {
        return $this->class::fromArray($config);
    }
}