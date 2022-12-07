<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LangTest extends TestCase
{
	public function test_if_default_language_is_english()
	{
		$this->assertTrue(App::getLocale() === 'en');
	}

	public function test_if_user_can_change_en_to_ka()
	{
		$this->get(route('lang.switch', 'ka'));
		$this->assertTrue(Session::get('applocale') === 'ka');
	}

	public function test_if_user_can_change_language_back_to_default()
	{
		$this->get(route('lang.switch', 'ka'));
		$this->assertTrue(Session::get('applocale') === 'ka');
		$this->get(route('lang.switch', 'en'));
		$this->assertTrue(Session::get('applocale') === 'en');
	}
}
