<?php

namespace Mailery\Setting\Model;

use Yiisoft\Form\Field\Base\InputField;

interface SettingInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return InputField
     */
    public function getField(): InputField;

    /**
     * @return array
     */
    public function getRules(): array;

    /**
     * @param array $config
     * @return self
     */
    public static function fromArray(array $config): self;
}
