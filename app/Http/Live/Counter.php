<?php

namespace App\Http\Live;

class Counter {
    public int $count = 10;
    public function increment() {
        $this->count++;
    }
    public function render() {
        return <<<'HTML'
        <div class="flex items-center justify-center space-x-3">
            <button wire:click="increment" type="button">+</button>
            <p class="px-3 py-2 border rounded-full">{{ $count ?? 'not defined'}}</p>
            <button wire:click="decrement" type="button">-</button>
        </div>
    HTML;
    }
}
