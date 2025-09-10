<?php

namespace App;

use Illuminate\Support\Facades\Request;

class Live {
    function initialRender(string $class) {
        $component = new $class;
        $html =  \Illuminate\Support\Facades\Blade::render($component->render(), $this->getProperties($component));
        $snapshot = [
            'class' => get_class($component),
            'data' => $this->getProperties($component)
        ];
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
    function livewire(Request $request) {
        return $request->all();
    }
}
