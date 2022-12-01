<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
	public function sum()
	{
		$stats = Stat::all();
		return view('admin', [
			'worldStats' => [
				'confirmed' => $stats->sum('confirmed'),
				'recovered' => $stats->sum('recovered'),
				'deaths'    => $stats->sum('deaths'),
			],
			'world' => true,
		]);
	}

	public function getStats(Request $request)
	{
		$table = DB::table('stats');
		return view('admin', [
			'stats' => isset($request->col) ? $table->orderBy($request->col, $request->sort)->get() : $table->get(),
		]);
	}
}
