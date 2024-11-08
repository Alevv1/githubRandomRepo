<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class index extends Component
{
    public $repository;

    public function mount()
    {
        $this->getRandomRepository();
    }

    public function getRandomRepository()
    {
        $randomPage = rand(1, 100);

        $response = Http::get('https://api.github.com/search/repositories', [
                'q' => 'stars:>0',
                'sort' => 'stars',
                'order' => 'desc',
                'per_page' => 1,
                'page' => $randomPage
            ]);

        if ($response->successful()) {
            $this->repository = $response->json()['items'][0] ?? null;
        } else {
            $this->repository = null;
        }
    }

    public function render()
    {
        return view('livewire.index');
    }
}
