<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Utils\Url;
use Illuminate\Support\Facades\Config;

class GeneratorTest extends TestCase
{
    /**
     * Tests that the generator returns the same hash for a given URL.
     */
    public function test_that_hash_is_equal_for_same_url(): void
    {
        Config::shouldReceive('get')
            ->with('generator.salt')
            ->andReturn('test');

        $shortened = Url::shorten('https://www.google.com');
        $this->assertEquals('DzmP36svpIzcV5XgVohymCsWEWqDWqyHZ3BmOaFVotRCP20ycSHMq4i8NTBcCLGQmCDezKmEV', $shortened);
    }

    /**
     * Tests that the generator can unshorten a given hash.
     */
    public function test_that_unshorten_returns_original_url(): void
    {
        Config::shouldReceive('get')
            ->with('generator.salt')
            ->andReturn('test');

        $unshortened = Url::unshorten('DzmP36svpIzcV5XgVohymCsWEWqDWqyHZ3BmOaFVotRCP20ycSHMq4i8NTBcCLGQmCDezKmEV');
        $this->assertEquals('https://www.google.com', $unshortened);
    }
}
