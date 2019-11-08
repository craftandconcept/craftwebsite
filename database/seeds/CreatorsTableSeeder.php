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
            'creator_name' => 'Oleg Drozdov (DP)',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Tymofii Ulanchenko (DP)',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Vyacheslav Zhemir',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'AIM Group, Ivan Malinka and Abueva Anastasiya',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Yana and Andrii Briukhovetskiy',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Sergii and Igor Fomichov',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Ilya and Mariia Pavlovy',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Alexander Dizzroom',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Pavel Mito',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Evgeniy',

        ]);
        DB::table('creators')->insert([
            'creator_name' => 'Vlad Vishnevskiy',

        ]);
    }
}
