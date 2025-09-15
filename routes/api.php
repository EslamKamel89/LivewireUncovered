<?php

use App\Live;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('/live', function (Request $request) {
    $component =   (new Live())->fromSnapshot($request->get('snapshot'));
    if ($method = $request->get('callMethod')) {
        (new Live())->callMethod($component, $method);
    }
    if ([$property, $value] = $request->get('updateProperty')) {
        (new Live())->updateProperty($component, $property, $value);
    }
    [$html, $snapshot] = (new Live())->toSnapshot($component);
    return [
        'html' => $html,
        'snapshot' => $snapshot,
    ];
})->withoutMiddleware([TrimStrings::class, ConvertEmptyStringsToNull::class]);
