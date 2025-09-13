<?php

namespace App\Http\Live;

class Counter {
    public int $count = 0;
    public function increment() {
        $this->count++;
    }
    public function decrement() {
        $this->count--;
    }
    public function render() {
        return <<<'HTML'
        <div class="flex flex-col items-center">
            <div class="flex items-center justify-center space-x-3">
                <button wire:click="increment" type="button">+</button>
                <p class="px-3 py-2 border rounded-full">{{ $count ?? 'not defined'}}</p>
                <button wire:click="decrement" type="button">-</button>
            </div>
            <div><input type="text"></div>
        </div>
    HTML;
    }
}
