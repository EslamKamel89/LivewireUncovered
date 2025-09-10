<?php

use App\Live;
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
    [$html, $snapshot] = (new Live())->toSnapshot($component);
    return [
        'html' => $html,
        'snapshot' => $snapshot,
    ];
});
