<?php

namespace App\Support;

use ReflectionClass;
use ReflectionProperty;

abstract class DataTransferObject
{
    public function __construct(array $data = [])
    {
        $class = new ReflectionClass(static::class);

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $publicProperty) {
            $propertyName = $publicProperty->getName();

            if (isset($data[$propertyName])) {
                $this->{$propertyName} = $data[$propertyName];
            }
        }
    }

    public function toArray()
    {
        $class = new ReflectionClass(static::class);

        $values = [];
        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyValue = $this->{$property->getName()};
            if ($propertyValue) {
                $values[$property->getName()] = $propertyValue;
            }
        }

        return $values;
    }
}
