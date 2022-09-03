<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function an_authentic_user_can_create_country()
    {
        $this->withoutExceptionHandling();

        $this->login();

        $attributes = ['name' => $this->faker->name];

        $this->post('/dashboard/countries', $attributes);

        $this->assertDatabaseHas('countries', $attributes);
    }
}
