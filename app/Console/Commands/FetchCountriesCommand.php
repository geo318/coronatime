<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCountriesCommand extends Command
{
	protected $signature = 'fetch:countries';

	protected $description = 'This command fetches country list from Api endpoint and stores into database';

	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries')->json();

		foreach ($countries as $id => $country)
		{
			Country::updateOrCreate([
				'code' => $country['code'],
				'name' => json_encode($country['name']),
			]);
		}

		$this->info('Counties table Successfully created');
	}
}
