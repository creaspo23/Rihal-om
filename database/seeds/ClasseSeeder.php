<?php

use Illuminate\Database\Seeder;


class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Classes::class, 15)->create();
    }
}
