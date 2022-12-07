<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_if_visiting_registration_page_successful()
	{
		$this->get(route('register'))->assertViewIs('register');
	}

	public function test_registration_should_return_errors_if_inputs_empty()
	{
		$this->post(route('register'))->assertSessionHasErrors(['username', 'email', 'password', 'repeat']);
	}

	public function test_registration_should_return_errors_if_username_and_password_less_then_three_chars()
	{
		$this->post(route('register'), [
			'username' => 'me',
			'email'    => 'me@test.com',
			'password' => '12',
		])->assertSessionHasErrors(['username', 'password', 'repeat']);
	}

	public function test_registration_should_return_errors_if_email_format_invalid()
	{
		$this->post(route('register'), [
			'username' => 'user',
			'email'    => 'me.test.com',
			'password' => '123',
		])->assertSessionHasErrors(['email']);
	}

	public function test_registration_should_return_errors_if_passwords_do_not_match()
	{
		$this->post(route('register'), [
			'username' => 'user',
			'email'    => 'me@test.com',
			'password' => 'do_not',
			'repeat'   => 'match',
		])->assertSessionHasErrors(['repeat']);
	}

	public function test_registration_successful_redirect_to_email_confirmation_notice()
	{
		$this->post(route('register'), [
			'username' => 'user',
			'email'    => 'user@test.com',
			'password' => 'longer-then-3',
			'repeat'   => 'longer-then-3',
		])->assertRedirectToRoute('verification.notice');
	}

	public function test_registered_user_redirect_back_to_resend_email_page_if_email_verification_not_sent()
	{
		$response = $this->post(route('register'), [
			'username' => 'user',
			'email'    => 'user@test.com',
			'password' => 'longer-then-3',
			'repeat'   => 'longer-then-3',
		]);
		$response->assertRedirectToRoute('verification.notice');
		$this->post(route('verification.send'));

		$response->assertRedirectToRoute('verification.notice');
	}

	public function test_if_registered_user_verified_successful()
	{
		$credentials = [
			'username'              => 'username',
			'email'                 => 'user@testmail.com',
			'password'              => $password = 'password',
			'repeat'                => $password,
		];
		$this->post(route('register'), $credentials)->assertRedirect(route('verification.notice'));

		event(new Registered($user = User::first()));
		Notification::fake()->assertNothingSent();

		$this->get(URL::temporarySignedRoute(
			'verification.verify',
			now()->addMinutes(30),
			[
				'id'   => $user,
				'hash' => sha1($user->email),
			]
		))->assertViewIs('auth.verify-login');
	}
}
