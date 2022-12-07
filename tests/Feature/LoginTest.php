<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

	public function test_if_an_unauthorized_user_is_redirected_from_index_to_login_page()
	{
		$this->get('/')->assertRedirectToRoute('login');
	}

	public function test_auth_should_display_errors_if_input_not_provided()
	{
		$this->post(route('login'))
			->assertSessionHasErrors(['username', 'password']);
	}

	public function test_auth_should_display_errors_if_email_or_username_not_provided()
	{
		$this->post(route('login'), ['password' => 'some-password'])
			->assertSessionHasErrors(['username']);
	}

	public function test_auth_should_display_error_if_username_provided_but_not_password()
	{
		$this->post(route('login'), ['username' => 'some-user'])
			->assertSessionHasErrors(['password']);
	}

	public function test_auth_should_display_error_if_email_provided_but_not_password()
	{
		$this->post(route('login'), ['email' => 'user@email.com'])
			->assertSessionHasErrors(['password']);
	}

	public function test_auth_should_display_errors_if_password_or_username_length_less_then_three_chars()
	{
		$this->post(route('login'), ['username' => 'me', 'password' => '12'])
			->assertSessionHasErrors(['password', 'username']);
	}

	public function test_auth_should_display_errors_if_user_does_not_exist()
	{
		$this->post(route('login'), ['username' => 'username', 'password' => 'password'])
			->assertSessionHasErrors(['username' => __('login_error')]);
	}

	public function test_auth_user_authentication_successful_with_email_redirects_to_admin_dashboard()
	{
		$email = 'test@email.com';
		$password = 'longer-then-3';

		User::factory()->create([
			'email' => $email, 'password' => bcrypt($password),
		]);

		$this->post(route('login'), [
			'email'=> $email, 'password'=>$password,
		])->assertRedirect(route('admin.world'));
	}

	public function test_auth_user_authentication_successful_with_username_redirects_to_admin_dashboard()
	{
		$username = 'returning-user';
		$password = 'longer-then-3';

		User::factory()->create([
			'username' => $username, 'password' => bcrypt($password),
		]);

		$this->post(route('login'), [
			'username'=> $username, 'password'=>$password,
		])->assertRedirect(route('admin.world'));
	}

	public function test_auth_user_authentication_successful_and_remember_token_set()
	{
		$username = 'user';
		$password = 'longer-then-3';

		User::factory()->create([
			'username' => $username, 'password' => bcrypt($password),
		]);

		$this->post(route('login'), [
			'username'=> $username, 'password'=>$password, 'remember' => 'true',
		])->assertSessionHasNoErrors()->assertStatus(302);
	}
}
