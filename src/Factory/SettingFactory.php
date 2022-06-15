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
    private string $settingClass;

    /**
     * @var Injector
     */
    private Injector $injector;

    /**
     * @param string $settingClass
     * @throws InvalidArgumentException
     */
    public function __construct(string $settingClass, Injector $injector)
    {
        if (!is_subclass_of($settingClass, SettingInterface::class)) {
            throw new InvalidArgumentException(sprintf(
                'Class "%s" does not implement "%s".',
                $settingClass,
                SettingInterface::class,
            ));
        }

        $this->settingClass = $settingClass;
        $this->injector = $injector;
    }

    /**
     * @param array $config
     * @return SettingInterface
     */
    public function create(array $config): SettingInterface
    {
        return $this->settingClass::fromArray(
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
