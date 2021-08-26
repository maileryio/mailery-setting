<?php

namespace Mailery\Setting\Factory;

use Mailery\Setting\Model\SettingInterface;
use Mailery\Setting\Factory\SettingFactoryInterface;
use InvalidArgumentException;
use Yiisoft\Injector\Injector;

class SettingFactory implements SettingFactoryInterface
{
    /**
     * @var string
     */
    private string $class;

    /**
     * @var Injector
     */
    private Injector $injector;

    /**
     * @param string $class
     * @throws InvalidArgumentException
     */
    public function __construct(string $class, Injector $injector)
    {
        if (!is_subclass_of($class, SettingInterface::class)) {
            throw new InvalidArgumentException(sprintf(
                'Class "%s" does not implement "%s".',
                $class,
                SettingInterface::class,
            ));
        }

        $this->class = $class;
        $this->injector = $injector;
    }

    /**
     * @param array $config
     * @return SettingInterface
     */
    public function create(array $config): SettingInterface
    {
        return $this->class::fromArray(
            array_map(
                function ($value) {
                    if (is_callable($value)) {
                        return $this->injector->invoke($value);
                    }
                    return $value;
                },
                $config
            )
        );
    }
}