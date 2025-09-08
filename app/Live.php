<?php

namespace App;

class Live {
    function initialRender(string $class) {
        $component = new $class;
        return \Illuminate\Support\Facades\Blade::render($component->render(), $this->getProperties($component));
    }
    function getProperties($component): array {
        $properties = [];
        $reflection = new \ReflectionClass($component);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($properties as $property) {
            $properties[$property->getName()] = $property->getValue($component);
        }


        return $properties;
    }
}
