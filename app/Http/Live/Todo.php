<?php

namespace App\Http\Live;

class Todo {
    public function render() {
        return <<<'HTML'
        <div class="flex flex-col items-center w-full">
            <div class="flex space-x-2">
                <input type="text" />
                <button>+ Todo</button>
            </div>
            <ul class="flex flex-col items-center">
                <li class="p-2 border rounded-lg shadow-lg min-w-md">one todo</li>
            </ul>
        </div>
        HTML;
    }
}
