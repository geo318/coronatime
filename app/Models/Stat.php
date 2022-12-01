<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
	protected $fillable = [
		'country',
		'country_id',
		'confirmed',
		'recovered',
		'critical',
		'deaths',
	];
	public function scopeFilter($query, array $filters)
	{
		
		$query->when(
			$filters['search'] ?? false,
			fn ($query, $search) => $query->
			where(fn ($query) => $query
				->where('title', 'like', '%' . $search . '%')
				->orWhere('body', 'like', '%' . $search . '%'))
		);
		$query->when(
			$filters['category'] ?? false,
			fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category))
		);

		$query->when(
			$filters['author'] ?? false,
			fn ($query, $author) => $query->whereHas('author', fn ($query) => $query->where('username', $author))
		);
	}
}
