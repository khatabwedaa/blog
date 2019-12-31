<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class CreateBlogPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_may_not_create_posts()
    {
        $this->withExceptionHandling();
        
        $this->get('/posts/create')    
            ->assertRedirect('/login');

        $this->post(route('posts.store'))
                ->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_create_blog_posts()
    {
        $this->signIn(); 

       $post = make('App\Post');

       $responce = $this->post(route('posts.store') , $post->toArray());

        $this->get($responce->headers->get('Location'))
            ->assertSee($post->title)
                ->assertSee($post->body);
    }
}
