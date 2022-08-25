<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectionAboutPageTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function redirect_about()
    {
        // $this->withoutExceptionHandling(); //untuk cek errornya dimana
        $this->get('/about-page')->assertRedirect('/about');
    }

    /** @test */
    public function about_page_can_be_rendered()
    {
        $this->get('/about')->assertStatus(200);
    }
}
