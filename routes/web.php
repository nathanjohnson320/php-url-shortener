<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;

Route::get('/', Home::class);

// Any route that isn't the home route will be handled by the UrlController
// Which is where we will redirect the user to the long URL
Route::get('/{any}', function ($any) {
  return (new UrlController)->show($any);
})->where('any', '.*');
