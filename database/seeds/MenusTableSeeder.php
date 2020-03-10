<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

           foreach (range(1,6) as $index) {

            DB::table('menus')->insert([

                'title' => $faker->title,
                'link' => $faker->name,

                'parent_id' => 0

            ]);

        }

        foreach (range(1,50) as $index) {

            DB::table('menus')->insert([

                'name' => $faker->name,
                'link' => $faker->name,

                'parent_id' => $faker->numberBetween(1,20)

            ]);

        }
    }
}
