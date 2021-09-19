<?php

namespace Tschallacka\StormCompat\Attribute;

class AttributeState
{
    protected $name;
    protected $value;


    /**
     * @var AttributeValue
     */
    protected $instance;
    protected $changed = false;

    public function __construct(AttributeValue $value)
    {
        $this->value = $value->value;
        $this->name = $this->value->attribute->attribute_code;
        $this->instance = $value;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        $this->instance->value = $value;
        $this->changed = true;
    }

    /**
     * @return AttributeValue
     */
    public function getInstance(): AttributeValue
    {
        return $this->instance;
    }

    /**
     * @return bool
     */
    public function isChanged(): bool
    {
        return $this->changed;
    }
}
