<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Url;

class Home extends Component
{
    #[Validate('required|unique:urls|starts_with:https://,http://')]
    public $longUrl = '';

    public $urls = [];

    public function __construct()
    {
        $this->urls = Url::all();
    }

    public function save()
    {
        $this->validate();

        Url::create(
            $this->only(['longUrl'])
        );

        session()->flash('status', 'Short Url created: ');

        return $this->redirect('/');
    }

    public function delete($id)
    {
        Url::where('id', $id)->delete();

        return $this->redirect('/');
    }

    #[Title('PHP Url Shortener')]
    public function render()
    {
        return view('livewire.home');
    }
}
