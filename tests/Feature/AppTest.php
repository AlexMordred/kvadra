<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function list_of_categories_and_points_is_returned_on_app_creation()
    {
        factory('App\Point', $total = 10)->create();

        $response = $this->getJson(route('index'))
            ->assertStatus(200)
            ->assertJsonStructure(['data' => ['categories', 'points']])
            ->json()['data'];

        $this->assertCount(10, $response['categories']);
        $this->assertCount(10, $response['points']);
    }
}
