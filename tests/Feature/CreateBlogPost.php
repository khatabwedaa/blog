<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateBlogPost extends TestCase
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

        dd(auth());
       $post = make('App\Post');

       $responce = $this->post(route('posts.store') , $post->toArray());

        $this->get($responce->headers->get('Location'))
            ->assertSee($post->title)
                ->assertSee($post->body);
    }
}
