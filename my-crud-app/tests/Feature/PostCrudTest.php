<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCrudTest extends TestCase
{
    /**
     * A basic feature test example.
     */
 
    public function test_can_create_post()
{
    $data = ['title' => 'Test title', 'body' => 'Test body'];

    $this->post(route('posts.store'), $data)
         ->assertRedirect(route('posts.index'));

    $this->assertDatabaseHas('posts', ['title' => 'Test title']);
}

}
