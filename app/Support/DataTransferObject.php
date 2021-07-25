<?php

namespace App\Support;

use ReflectionClass;
use ReflectionProperty;

abstract class DataTransferObject
{
    public function __construct(array $data = [])
    {
        $class = new ReflectionClass(static::class);

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyName = $property->getName();
            if (!isset($data[$propertyName])) {
                continue;
            }

            $setMethodName = "set$propertyName";
            if ($class->hasMethod($setMethodName)) {
                $this->{$setMethodName}($data[$propertyName]);
            } else {
                $this->{$propertyName} = $data[$propertyName];
            }
        }
    }

    public function toArray()
    {
        $class = new ReflectionClass(static::class);

        $values = [];
        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyName = $property->getName();

            $getMethodName = "get$propertyName";
            if ($class->hasMethod($getMethodName)) {
                $values[$propertyName] = $this->{$getMethodName}();
                continue;
            }

            $propertyValue = $this->{$propertyName};
            if ($propertyValue) {
                $values[$property->getName()] = $propertyValue;
            }
        }

        return $values;
    }
}
