<?php

namespace Tests\Feature;

use App\Models\Stat;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create(['password' => bcrypt('password')]);
	}

	public function test_authenticated_user_redirected_to_admin_page()
	{
		$this->actingAs($this->user)->get(route('admin.world'))->assertSuccessful();
	}

	public function test_logged_in_user_load_country_statistics_page()
	{
		$this->actingAs($this->user)->get(route('admin.country'))->assertSuccessful();
	}

	public function test_user_search()
	{
		$en = 'georgia';
		$ka = 'საქართველო';
		$keyword = 'geo';
		Stat::factory()->create(['locale' => json_encode(['en' => $en, 'ka' => $ka]),'country' => $en]);
		$this->actingAs($this->user)->get(route('admin.country') . "?search={$keyword}")->assertSee($en);
	}

	public function test_user_search_ka()
	{
		$en = 'georgia';
		$ka = 'საქართველო';
		$keyword = 'საქარ';
		Stat::factory()->create(['locale' => json_encode(['en' => $en, 'ka' => $ka]),'country' => $en]);
		$this->actingAs($this->user)->get(route('admin.country') . "?search={$keyword}")->assertOk();
	}

	public function test_user_logout_redirected_to_login_page()
	{
		$this->actingAs($this->user)->post(route('logout'))->assertRedirect(route('login'));
	}

	public function test_user_filter_redirect_back_if_column_is_provided_but_not_sort_()
	{
		$en = 'georgia';
		$ka = 'საქართველო';
		Stat::factory()->create(['locale' => json_encode(['en' => $en, 'ka' => $ka]),'country' => $en]);
		$this->actingAs($this->user)->get(route('admin.country') . "?col=location")
			->assertRedirect()
			->assertSessionHasErrors(['sort']);
	}

	public function test_user_filter_redirect_back_if_sort_attribute_is_provided_but_not_col()
	{
		$en = 'georgia';
		$ka = 'საქართველო';
		Stat::factory()->create(['locale' => json_encode(['en' => $en, 'ka' => $ka]),'country' => $en]);
		$this->actingAs($this->user)->get(route('admin.country') . "?sort=asc")
			->assertRedirect()
			->assertSessionHasErrors(['col']);
	}

	public function test_user_filter_redirect_back_if_sort_attribute_value_is_not_correct()
	{
		$en = 'georgia';
		$ka = 'საქართველო';
		Stat::factory()->create(['locale' => json_encode(['en' => $en, 'ka' => $ka]),'country' => $en]);
		$this->actingAs($this->user)->get(route('admin.country') . "?sort=wrong&col=country")
			->assertRedirect()
			->assertSessionHasErrors(['sort']);
	}
	public function test_user_filter_redirect_back_if_col_attribute_value_is_not_correct()
	{
		$en = 'georgia';
		$ka = 'საქართველო';
		Stat::factory()->create(['locale' => json_encode(['en' => $en, 'ka' => $ka]),'country' => $en]);
		$this->actingAs($this->user)->get(route('admin.country') . "?sort=asc&col=wrongColumn")
			->assertRedirect()
			->assertSessionHasErrors(['col']);
	}
	public function test_user_filter_successful()
	{
		$en = 'georgia';
		$ka = 'საქართველო';
		Stat::factory()->create(['locale' => json_encode(['en' => $en, 'ka' => $ka]),'country' => $en]);
		$this->actingAs($this->user)->get(route('admin.country') . "?sort=asc&col=country")
			->assertOk();
	}
	public function test_user_filter_successful_with_search()
	{
		$en = 'georgia';
		$ka = 'საქართველო';
		$keyword = 'geo';

		Stat::factory()->create(['locale' => json_encode(['en' => $en, 'ka' => $ka]),'country' => $en]);
		$this->actingAs($this->user)->get(route('admin.country') . "?sort=asc&col=country&search={$keyword}")
			->assertOk();
	}
}
