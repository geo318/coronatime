<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Stat;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchStatsCommand extends Command
{
	protected $signature = 'fetch:stats';

	protected $description = 'This command fetches statistics list from Api endpoint and stores into database';

	public function handle()
	{
		foreach (Country::all() as $country)
		{
			$stat = Http::post('https://devtest.ge/get-country-statistics', [
				'code'=> $country->code,
			])->json();

			Stat::updateOrCreate([
				'country'    => $stat['country'],
				'country_id' => $country['id'],
				'confirmed'  => $stat['confirmed'],
				'recovered'  => $stat['recovered'],
				'critical'   => $stat['critical'],
				'deaths'     => $stat['deaths'],
			]);
		}

		$this->info('Counties table Successfully created');
	}
}
