<?php

namespace App\Utils;

use Sqids\Sqids;

class Url
{
  public static function shorten(string $url): string
  {
    $sqids = new Sqids();

    $characters = str_split(self::salt() . $url);
    $asciiArray = array_map('ord', $characters);

    return $sqids->encode($asciiArray);
  }

  public static function unshorten(string $url): string
  {
    $sqids = new Sqids();

    $asciiArray = $sqids->decode($url);
    $characters = array_map('chr', $asciiArray);

    // Characters will include the salt, so we need to remove it
    return substr(implode('', $characters), strlen(self::salt()));
  }

  private static function salt(): string
  {
    return \Config::get('generator.salt');
  }
}