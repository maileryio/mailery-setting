<?php

use Mailery\Setting\Model\Setting;
use Mailery\Setting\Model\SettingGroupList;
use Mailery\Setting\Factory\SettingFactory;
use Mailery\Setting\Factory\SettingFactoryInterface;

return [
    SettingFactoryInterface::class => [
        'class' => SettingFactory::class,
        '__construct()' => [
            Setting::class,
        ],
    ],

    SettingGroupList::class => [
        '__construct()' => [
            'elements' => array_filter(array_map(
                function (array $group) {
                    return $group['reference'] ?? null;
                },
                $params['maileryio/mailery-setting']['groups']
            )),
        ],
    ],
];
