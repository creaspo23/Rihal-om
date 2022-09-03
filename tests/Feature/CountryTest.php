<?php

namespace Tests\Feature;

use App\Country;
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


    
    /**
     * @test
     */
    public function an_auth_user_can_update_counrty()
    {
        $this->withoutExceptionHandling();

         $country = factory(Country::class)->create([
            'name' => 'sudan',
        ]);

        $this->login();

        $this->put("/dashboard/countries/$country->id", [
            'name' => 'Updated sudan',
        ]);

        $this->assertDatabaseHas('countries', ['name' => 'Updated sudan']);

        
    }

      /**
     * @test
     */
    public function an_auth_user_can_delete_country()
    {
        $this->withoutExceptionHandling();

        $country = factory(Country::class)->create([
            'name' => 'sudan',
        ]);


        $this->login();

        $this->delete("/dashboard/countries/$country->id");

        $this->assertDatabaseMissing('countries', ['name' => $country->name]);


    }
    
}
