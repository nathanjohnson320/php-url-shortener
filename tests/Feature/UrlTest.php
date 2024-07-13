<?php

namespace Tests\Feature;

use Tests\TestCase;
use \App\Models\Url;

class UrlTest extends TestCase
{
  /**
   * Test that the short Url redirects to the long Url
   */
  public function test_the_short_url_redirects_to_long(): void
  {
    $url = Url::create([
      'longUrl' => 'https://laravel.com'
    ]);

    $response = $this->get("/{$url->shortUrl}");
    $response->assertRedirect("https://laravel.com");
  }
}