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
            'name' => "travel"
        ]);

        DB::table('tags')->insert([
            'name' => "photography"
        ]);

        DB::table('tags')->insert([
            'name' => "cities"
        ]);

        DB::table('tags')->insert([
            'name' => "art"
        ]);

        DB::table('tags')->insert([
            'name' => "architecture"
        ]);

        DB::table('tags')->insert([
            'name' => "food"
        ]);

        DB::table('tags')->insert([
            'name' => "culture"
        ]);

        DB::table('tags')->insert([
            'name' => "coding"
        ]);

        DB::table('tags')->insert([
            'name' => "inspiration"
        ]);

        DB::table('tags')->insert([
            'name' => "design"
        ]);

        DB::table('tags')->insert([
            'name' => "fashion"
        ]);
    }
}