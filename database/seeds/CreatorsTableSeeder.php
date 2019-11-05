<?php

use Illuminate\Database\Seeder;

class CreatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('creators')->insert([
            'creator_name' => 'Author 1',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Author 2',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Author 3',

        ]);
    }
}
