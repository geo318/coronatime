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
}
