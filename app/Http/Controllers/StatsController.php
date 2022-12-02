<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilterRequest;
use App\Models\Stat;
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

	public function getStats(StoreFilterRequest $request)
	{
		['col' => $col, 'sort' => $sort, 'search' => $search] = $request;

		$table = DB::table('stats')
			->where('country', 'like', '%' . $search . '%')
			->orWhere('locale', 'like', '%' . $search . '%');

		return view('admin', [
			'stats' => isset($col) ? $table->orderBy($col, $sort)->get() : $table->get(),
		]);
	}
}
