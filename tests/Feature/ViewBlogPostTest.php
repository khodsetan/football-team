<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Post;
class ViewBlogPostTest extends TestCase
{
    use DatabaseMigrations;
    
    
   public function testCanViewABlogPost(){
       //Arranement
       // creete a blog post
       $post = Post::create([
           "title" => 'Simple Title',
           "body" => 'Simple Body'
       ]);
       //Action
       // visiting a route
       $resp = $this->get("/post/{$post->id}");
       //Assert
       // assert status code 200
       $resp->assertStatus(200);
       // assert that we see post title
       $resp->assertSee($post->title);
       // assert that we see post body
       $resp->assertSee($post->body);
       // assert that we see publish date
//       $resp->assertSee($post->created_at);
   }
}
