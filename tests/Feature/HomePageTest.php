<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function home_page_bisa_diakses()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->get('/home')->assertStatus(200);
    }

    /** @test */
    public function redirect_jika_user_unauthenticated()
    {
        $this->get('/home')->assertRedirect(route('login'));
    }
}
