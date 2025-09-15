<?php

namespace App\Http\Live;

class Todo {
    public string $draft = '';
    /** @var string[] */
    public array $todos = ['Study livewire', 'Workout', 'Study AWS fundamentals'];
    public function addTodo() {
        if ($this->draft === '') return;
        $this->todos[] = $this->draft;
        $this->draft = '';
    }
    public function render() {
        return <<<'HTML'
        <div class="flex flex-col items-center w-full">
            <div class="flex space-x-2">
                <input type="text" wire:model="draft" />
                <button>+ Todo</button>
            </div>
            <ul class="flex flex-col items-center space-y-1">
                @foreach($todos as $todo)
                <li class="p-2 duration-1000 border rounded-lg shadow-lg min-w-md hover:translate-y-1 hover:scale-105 hover:shadow-2xl hover:mb-2">{{$todo}}</li>
                @endforeach
            </ul>
        </div>
        HTML;
    }
}
