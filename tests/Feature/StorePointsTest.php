<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Point;

class StorePointsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anyone_can_store_points_into_the_database()
    {
        $this->assertEquals(0, Point::count());

        $data = [
            'category_id' => factory('App\Category')->create()->id,
            'lat' => 100.500,
            'long' => 100.500,
        ];

        $this->postJson(route('points.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, Point::count());

        $point = Point::first();

        $this->assertEquals($data['category_id'], $point['category_id']);
        $this->assertEquals($data['lat'], $point['lat']);
        $this->assertEquals($data['long'], $point['long']);
    }

    /** @test */
    public function a_point_requires_a_category_id()
    {
        $this->withExceptionHandling();

        $this->postJson(route('points.store'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['category_id']);
    }

    /** @test */
    public function a_point_requires_an_existing_category_id()
    {
        $this->withExceptionHandling();

        $this->postJson(route('points.store'), ['category_id' => 999])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['category_id']);
    }

    /** @test */
    public function a_point_requires_a_latitude()
    {
        $this->withExceptionHandling();

        $this->postJson(route('points.store'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['lat']);
    }

    /** @test */
    public function a_point_requires_a_longitude()
    {
        $this->withExceptionHandling();

        $this->postJson(route('points.store'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['long']);
    }
}
