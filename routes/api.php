<?php

use App\Live;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('/live', function (Request $request) {
    (new Live())->fromSnapshot($request->get('snapshot'));
    return $request->all();
});
