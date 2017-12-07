<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => "God-tier kaassaus"
        ]);

        DB::table('tags')->insert([
            'name' => "Goede kaassaus"
        ]);

        DB::table('tags')->insert([
            'name' => "Middelmatige kaassaus"
        ]);

        DB::table('tags')->insert([
            'name' => "Ondermaatse kaassaus"
        ]);

        DB::table('tags')->insert([
            'name' => "Ronduit slechte kaassaus"
        ]);
    }
}