<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class randomrepo extends Component
{
    public $repository;

    public $stars = 100;

    public $language;


    public $languages = [];
    public function mount()
    {

        $this->getRandomRepository();
    }


    public function getRandomRepository()
    {
        $randomPage = rand(1, 100);

        $starslimit = ($this->stars) + 1;

        $query = 'language:'.$this->language.' stars:<'.$starslimit;

        $response = Http::get('https://api.github.com/search/repositories', [
            'q' => $query,
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


    public function STARS100()
    {

        $response = Http::get('https://api.github.com/search/repositories', [
            'q' => 'stars:<'.$this->stars,
        ]);
        if ($response->successful()) {
            $this->repository = $response->json()['items'][0] ?? null;
        } else {
            $this->repository = null;
        }
    }



    public function render()
    {
        return view('livewire.random-repo');
    }
}
