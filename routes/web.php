<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return 'hello world';
    return view('counter');
});


Blade::directive('live', function ($expression) {
    return "<?php echo  (new \App\Live)->initialRender($expression) ?>";
});
