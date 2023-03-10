<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stat extends Model
{
	use HasFactory;

	protected $fillable = [
		'locale',
		'country',
		'country_id',
		'confirmed',
		'recovered',
		'critical',
		'deaths',
	];
}
