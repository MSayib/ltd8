<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_page_bisa_diakses()
    {
        $this->withoutExceptionHandling();
        $this->get('/login')->assertStatus(200);
    }

    /** @test */
    public function user_bisa_login()
    {
        $user = User::factory()->create();
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /** @test */
    public function user_harusnya_tidak_login_ketika_salah_kredensial()
    {
        $user = User::factory()->create();
        $this->post('login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
        $this->assertGuest();
    }
}
