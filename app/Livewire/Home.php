<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Url;

class Home extends Component
{
    public $urls = [];

    public function __construct()
    {
        $this->urls = Url::all();
    }

    public function create()
    {
        $this->count++;
    }

    #[Title('PHP Url Shortener')]
    public function render()
    {
        return view('livewire.home');
    }
}
