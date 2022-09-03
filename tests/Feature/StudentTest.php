<?php

namespace Tests\Feature;

use App\Classes;
use App\Country;
use App\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{

    use  RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function an_auth_user_can_create_student()
    {
        $this->withoutExceptionHandling();

        $this->login();

        $classe_id = factory(Classes::class)->create()->id;

        $country_id = factory(Country::class)->create()->id;

        $student = [
            'name' => 'john deo',
            'date_of_birth' => 1 - 11 - 1990,
            'classes_id' => $classe_id,
            'country_id' => $country_id,
        ];


        $this->post('/dashboard/students', $student);

        $this->assertDatabaseHas('students', $student);
    }


    /**
     * @test
     */
    public function an_auth_user_can_update_student()
    {
        $this->withoutExceptionHandling();

        $classe_id = factory(Classes::class)->create()->id;

        $country_id = factory(Country::class)->create()->id;

        $student = factory(Student::class)->create([
            'name' => 'john',
            'date_of_birth' => 1 - 1 - 1990,
            'classes_id' => $classe_id,
            'country_id' => $country_id,

        ]);

        $this->login();

        $this->put("/dashboard/students/$student->id", [
            'name' => 'wali',
            'date_of_birth' => 1 - 1 - 1990,
            'classes_id' => $classe_id,
            'country_id' => $country_id,
        ]);

        $this->assertDatabaseHas('students', ['name' => 'wali']);
    }


    /**
     * @test
     */
    public function an_auth_user_can_delete_student()
    {
        $this->withoutExceptionHandling();

        $classe_id = factory(Classes::class)->create()->id;

        $country_id = factory(Country::class)->create()->id;


        $student = factory(Student::class)->create([
            'name' => 'john',
            'date_of_birth' => 1 - 1 - 1990,
            'classes_id' => $classe_id,
            'country_id' => $country_id,

        ]);


        $this->login();


        $this->delete("/dashboard/students/$student->id");


        $this->assertDatabaseMissing('students', ['name' => $student->name]);
    }
}
