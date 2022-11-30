<?php

namespace App\Http\Controllers;

use App\Models\Stat;

class StatsController extends Controller
{
	public function sum()
	{
		$stats = Stat::all();
		return view('admin', [
			'stats' => [
				'confirmed' => $stats->sum('confirmed'),
				'recovered' => $stats->sum('recovered'),
				'deaths'    => $stats->sum('deaths'),
			],
			'world' => true,
		]);
	}
}
