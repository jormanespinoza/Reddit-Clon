<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;
use App\User;

class PostsControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    
    public function a_guess_can_see_all_posts()
    {
        // Arrange

        $posts = factory(Post::class, 10)->create();

        // Act

        $response = $this->get(route('posts_path'));

        //Assert

        $response->assertStatus(200);

        foreach($posts as $post) {
            $response->assertSee($post->title);
        }
    }

    /** @test */

    public function a_registered_user_can_see_all_posts()
    {
        // Arrange

        $user = factory(User::class)->create();
        $this->userSignIn($user);
        $posts = factory(Post::class, 10)->create();

        // Act

        $response = $this->get(route('posts_path'));

        //Assert

        $response->assertStatus(200);

        foreach($posts as $post) {
            $response->assertSee($post->title);
        }
    }

    /** @test */

    public function it_sees_posts_author()
    {
        // Arrange

        $posts = factory(Post::class, 10)->create();

        // Act

        $response = $this->get(route('posts_path'));

        //Assert

        $response->assertStatus(200);

        foreach($posts as $post) {
            $response->assertSee($post->title);
            $response->assertSee($post->user->name);
        }            
    }
}
