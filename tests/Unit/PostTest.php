<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;
use App\User;

class PostTest extends TestCase
{    
    use DatabaseMigrations;    
    /** @test */

    public function post_determines_its_author()
    {
        // Arrange

        $user = factory(User::class)->create();

        $post = factory(Post::class)->create(['user_id' => $user->id]); 

        $postByAnotherUser = factory(Post::class)->create();      

        // Act

        $postByAuthor = $post->wasCreatedBy($user);

        $postByAnotherAuthor = $postByAnotherUser->wasCreatedBy($user);

        // Assert

        $this->assertTrue($postByAuthor);
        $this->assertFalse($postByAnotherAuthor);
    } 

     /** @test */

    public function post_determines_its_author_if_null_return_false()
    {
        // Arrange
       
        $post = factory(Post::class)->create();        

        // Act

        $postByAuthor = $post->wasCreatedBy(null);       

        // Assert

        $this->assertFalse($postByAuthor);       
    }    
}
