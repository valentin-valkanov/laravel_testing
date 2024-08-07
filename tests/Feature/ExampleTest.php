<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
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
        $this->withoutExceptionHandling();

        $response = $this->json('POST', '/posts', ['foo' => 'bar']);

        $response->assertJson([
            'created' => true
        ]);

        $response->assertStatus(201);
    }
}
