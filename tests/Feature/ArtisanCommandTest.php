<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtisanCommandTest extends TestCase
{
    use RefreshDatabase;
    public function test_countries_fetch_successful()
    {
        $this->artisan('fetch:countries')->expectsOutput('Counties table Successfully created');
    }
    public function test_stats_by_country_fetch_successful()
    {
        Country::factory()->Create();
        $this->artisan('fetch:stats')->expectsOutput('Counties table Successfully created');
    }
}
