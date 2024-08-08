<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_asserting_the_correct_json_response(): void
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)->json('POST', '/posts', ['foo' => 'bar']);

        $response->assertJson([
            'created' => true
        ]);

        $response->assertStatus(201);
    }

    public function test_a_401_response_is_returned_if_not_authenticated(): void
    {

        $response = $this->json('POST', '/posts', ['foo' => 'bar']);


        $response->assertStatus(401);
    }

    public function test_a_post_can_be_created_for_a_user()
    {
        $user = User::factory()->create();

        $post = $user->posts()->create([
           'title' => 'A random post',
           'body' => 'Lorem ipsum dolor sit amet...'
        ]);

        $this->assertEquals('A random post', $post->title);
        $this->assertEquals($user->id, $post->user_id);
    }
}
