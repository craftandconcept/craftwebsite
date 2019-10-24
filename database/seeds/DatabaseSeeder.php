<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CountriesTableSeeder::class);

        DB::table('categories')->insert([
            'category_name' => 'Architecture',

        ]);
        DB::table('categories')->insert([
            'category_name' => 'Interior Design',

        ]);
        DB::table('categories')->insert([
            'category_name' => 'Individual objects',

        ]);
        DB::table('categories')->insert([
            'category_name' => '3D Rendering',

        ]);
        DB::table('categories')->insert([
            'category_name' => 'Brand Development',

        ]);
        DB::table('categories')->insert([
            'category_name' => 'Production Facilities',

        ]);
    }
}
