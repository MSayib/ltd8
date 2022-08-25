<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function register_page_bisa_diakses()
    {
        $this->get('register')->assertStatus(200);
    }

    /** @test */
    public function user_bisa_register()
    {
        $user = User::factory()->make();
        $response = $this->post('register', $user->toArray());
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
