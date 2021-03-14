<?php

namespace Mailery\Setting\Model;

use Mailery\Setting\Model\SettingInterface;
use Yiisoft\Form\Widget\Field;

class Setting implements SettingInterface
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $label;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var Field
     */
    private Field $field;

    /**
     * @var array
     */
    private array $rules;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Field
     */
    public function getField(): Field
    {
        return $this->field;
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param array $config
     * @return self
     */
    public static function fromArray(array $config): self
    {
        $new = new self();
        $new->name = $config['name'];
        $new->label = $config['label'];
        $new->description = $config['description'];
        $new->value = $config['value'] ?? null;
        $new->field = $config['field'];
        $new->rules = $config['rules'];

        return $new;
    }
}
