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
		// $response = Http::post('https://devtest.ge/get-country-statistics', [
		// 	'code'=> 'GE',
		// ]);
		// dd($response->body());
		// $countries = json_decode($response->body());
		foreach (Country::all() as $country)
		{
			$response = Http::post('https://devtest.ge/get-country-statistics', [
				'code'=> $country->code,
			]);
			$stat = json_decode($response->body());

			Stat::updateOrCreate([
				'country'    => $stat->country,
				'country_id' => $country->id,
				'confirmed'  => $stat->confirmed,
				'recovered'  => $stat->recovered,
				'critical'   => $stat->critical,
				'deaths'     => $stat->deaths,
			]);
		}

		$this->info('Counties table Successfully created');
	}
}
