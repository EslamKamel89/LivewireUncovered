<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>

<body>
    {!! live(\App\Http\Live\Counter::class) !!}
</body>

</html>
<?php

function live(string $class) {
    $component = new $class;
    return \Illuminate\Support\Facades\Blade::render($component->render(), getProperties($component));
}
function getProperties($component): array {
    $properties = [];
    $reflection = new ReflectionClass($component);
    $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
    foreach ($properties as $property) {
        $properties[$property->getName()] = $property->getValue($component);
    }


    return $properties;
}
