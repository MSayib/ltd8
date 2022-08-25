<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_bisa_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post('logout')
            ->assertSessionHas('message')
            ->assertRedirect(route('login'));
    }
}
