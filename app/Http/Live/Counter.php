<?php

namespace App\Http\Live;

class Counter {
    public int $count = 0;
    public function increment() {
        $this->count++;
    }
    public function render() {
        return <<<HTML
        <div class="flex items-center justify-center space-x-3">
            <button type="button">+</button>
            <p class="px-3 py-2 border rounded-full">0</p>
            <button type="button">-</button>
        </div>
    HTML;
    }
}
