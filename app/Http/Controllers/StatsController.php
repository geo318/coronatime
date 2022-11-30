<?php

namespace App\Http\Controllers;

use App\Models\Stat;

class StatsController extends Controller
{
	public function sum()
	{
		return view('admin', [
			'stats' => [
				'confirmed' => Stat::all()->sum('confirmed'),
				'recovered' => Stat::all()->sum('recovered'),
				'deaths'    => Stat::all()->sum('deaths'),
			],
			'world' => true,
		]);
	}
}
