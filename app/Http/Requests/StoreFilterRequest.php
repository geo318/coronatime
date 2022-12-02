<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;

class StoreFilterRequest extends FormRequest
{
	public function rules()
	{
		return [
			'col'    => ['required_with:sort', Rule::in(Schema::getColumnListing('stats'))],
			'sort'   => 'required_with:col|in:asc,desc',
			'search' => 'sometimes|max:20',
		];
	}
}
