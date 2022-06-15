<?php

namespace Mailery\Setting\Model;

use Mailery\Setting\Factory\SettingFactoryInterface;
use Doctrine\Common\Collections\ArrayCollection;

abstract class SettingGroup extends ArrayCollection
{

    /**
     * @param SettingFactoryInterface $factory
     * @param array $items
     * @param int $order
     */
    public function __construct(
        SettingFactoryInterface $factory,
        array $items,
        private int $order
    ) {
        $elements = [];
        foreach ($items as $key => $item) {
            $elements[$key] = $factory->create($item);
        }

        parent::__construct($elements);
    }

    /**
     * @return string
     */
    abstract public function getLabel(): string;

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

}
