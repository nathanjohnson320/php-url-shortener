<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Home;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
  /** 
   * Tests that the home page renders and returns a 200 status code.
   */
  public function test_renders_successfully(): void
  {
    Livewire::test(Home::class)
      ->assertStatus(200);
  }
}