<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'country_name' => 'Switzerland',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Germany',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Ukraine',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'France',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Portugal',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Austria',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Russia',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Spain',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Czeech Republic',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Afghanistan',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'South Korea',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Kuwait',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Qatar',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Iran',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'UAE',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Latvia',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'England',
            
        ]);
        DB::table('countries')->insert([
            'country_name' => 'USA',
            
        ]);
    }
}
