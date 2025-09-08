<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('counter');
});


Blade::directive('live', function ($expression) {
    return "<?php echo  (new \App\Live)->initialRender($expression) ?>";
});
