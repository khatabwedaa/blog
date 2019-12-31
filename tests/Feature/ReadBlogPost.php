<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadBlogPost extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->post = create('App\Post');
    }

    /** @test */
    public function guest_can_view_all_post()
    {
        $this->get('/blog')
            ->assertSee($this->post->body);
    }

     /** @test */
     public function guest_can_view_single_post()
     {
         $this->get('/blog/' . $this->post->slug)
             ->assertSee($this->post->body);
     }
}
