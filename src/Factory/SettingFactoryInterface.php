<?php

namespace Mailery\Setting\Factory;

use Mailery\Setting\Model\SettingInterface;

interface SettingFactoryInterface
{
    /**
     * @param array $config
     * @return SettingInterface
     */
    public function create(array $config): SettingInterface;
}
