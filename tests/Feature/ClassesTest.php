<?php

namespace Tests\Feature;

use App\Classes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassesTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function an_auth_user_can_create_class()
    {
        $this->withoutExceptionHandling();

        $this->login();

        $atributes = ['name' => $this->faker->name];

        $this->post('/dashboard/classes', $atributes);

        $this->assertDatabaseHas('classes', $atributes);
    }

       
    /**
     * @test
     */
    public function an_auth_user_can_update_class()
    {
        $this->withoutExceptionHandling();

         $classe = factory(Classes::class)->create([
            'name' => 'class 1',
        ]);

        $this->login();

        $this->put("/dashboard/classes/$classe->id", [
            'name' => 'class 2',
        ]);

        $this->assertDatabaseHas('classes', ['name' => 'class 2']);
    }
    

    
    /**
     * @test
     */
    public function an_auth_user_can_delete_class()
    {
        $this->withoutExceptionHandling();

        $classe = factory(Classes::class)->create([
            'name' => 'class 1',
        ]);


        $this->login();

        $this->delete("/dashboard/classes/$classe->id");

        $this->assertDatabaseMissing('classes', ['name' => $classe->name]);


    }
    
}
