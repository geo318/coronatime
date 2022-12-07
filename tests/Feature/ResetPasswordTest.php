<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create([
			'email'    => 'user@test.email',
			'password' => bcrypt('some-password'),
		]);
	}

	public function test_route_displays_reset_view()
	{
		$this->get(route('password.request'))->assertViewIs('auth.forgot-password');
	}

	public function test_if_errors_displayed_if_no_input_provided()
	{
		$this->post(route('password.email'))->assertSessionHasErrors(['email']);
	}

	public function test_if_errors_displayed_if_email_is_invalid()
	{
		$this->post(route('password.email', ['email'=>'invalid-email.com']))->assertSessionHasErrors(['email']);
	}

	public function test_if_email_submit_redirects_back_with_errors_if_user_does_not_exist()
	{
		$this->post(route('password.email', ['email'=>'no-user@email.com']))->assertSessionHasErrors(['email']);
	}

	public function test_successful_email_submit_shows_confirmation_notice()
	{
		$this->post(route('password.email', ['email'=>$this->user->email]))->assertViewIs('auth.verify-email');
	}

	public function test_user_should_receive_errors_if_no_reset_inputs_provided()
	{
		$this->post(route('password.update'))->assertSessionHasErrors(['email', 'password', 'token']);
	}

	public function test_password_reset_page_displays_errors_if_passwords_length_less_then_three()
	{
		$this->post(route('password.request'))->assertSessionHasErrors(['email']);
	}

	public function test_user_should_receive_errors_if_passwords_do_not_match()
	{
		$this->post(route('password.update'), [
			'token'                 => Password::createToken(User::first()),
			'email'                 => $this->user->email,
			'password'              => 'password',
			'password_confirmation' => 'not-match',
		])->assertSessionHasErrors(['password']);
	}

	public function test_user_can_login_with_updated_credentials()
	{
		$credentials = [
			'email'                 => $this->user->email,
			'password'              => $newPassword = 'new-password',
			'password_confirmation' => $newPassword,
			'token'                 => $token = Password::createToken(User::first()),
		];

		Notification::fake()->assertNothingSent();

		$this->get('/reset-password/' . $token)->assertOk();
		$this->post(route('password.update'), $credentials)->assertOk()->assertViewIs('auth.reset-login');

		$this->user->update(['password' => bcrypt($newPassword)]);
		event(new PasswordReset($this->user));

		$this->get(route('login'));
		$this->post(route('login'), [
			'email'    => $this->user->email,
			'password' => $newPassword,
		])->assertRedirectToRoute('admin.world');
	}
}
