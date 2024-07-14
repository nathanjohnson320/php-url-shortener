<?php

namespace App\Livewire;

use App\Models\Url;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Home extends Component
{
    /**
     * longUrl is the input field on our form that is used to create a new short URL.
     */
    #[Validate('required|unique:urls|starts_with:https://,http://')]
    public $longUrl = '';

    /*
     * urls is an array of all the URLs in the database. We probably want pagination on this at some 
     * point but for now it's just a demo!
     */
    public $urls = [];

    public function __construct()
    {
        $this->urls = Url::all();
    }

    public function save(): void
    {
        $this->validate();

        Url::create(
            $this->only(['longUrl'])
        );

        session()->flash('status', 'Short Url created: ');
        $this->redirect('/');
    }

    public function delete(string $id): void
    {
        Url::where('id', $id)->delete();
        $this->redirect('/');
    }

    #[Title('PHP Url Shortener')]
    public function render(): View
    {
        return view('livewire.home');
    }
}
