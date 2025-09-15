<?php

namespace App;

use Illuminate\Support\Facades\Request;

class Live {
    function initialRender(string $class) {
        $component = new $class;
        [$html, $snapshot] = $this->toSnapshot($component);
        $snapshotAttribute = htmlentities(json_encode($snapshot));
        return <<<HTML
        <div wire:snapshot="$snapshotAttribute">
            $html
        </div>
        HTML;
    }
    function getProperties($component): array {
        $result = [];
        $reflection = new \ReflectionClass($component);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($properties as $property) {
            $result[$property->getName()] = $property->getValue($component);
        }
        return $result;
    }
    function fromSnapshot(array $snapshot) {
        $component = new $snapshot['class'];
        $this->setProperties($component,  $snapshot['data']);
        return $component;
    }
    function setProperties($component,  array $properties) {
        foreach ($properties as $property => $value) {
            $component->{$property}  = $value;
        }
    }
    function callMethod($component, $method) {
        $component->{$method}();
    }
    function updateProperty($component, $property, $value) {
        $component->{$property} = $value;
    }
    function toSnapshot($component) {
        $html =  \Illuminate\Support\Facades\Blade::render(
            $component->render(),
            $properties = $this->getProperties($component)
        );
        $snapshot = [
            'class' => get_class($component),
            'data' => $properties,
        ];
        return [$html, $snapshot];
    }
}
