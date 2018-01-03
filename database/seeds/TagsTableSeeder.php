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
            'name' => "Travel"
        ]);

        DB::table('tags')->insert([
            'name' => "Photography"
        ]);

        DB::table('tags')->insert([
            'name' => "New York"
        ]);

        DB::table('tags')->insert([
            'name' => "London"
        ]);

        DB::table('tags')->insert([
            'name' => "Berlin"
        ]);

        DB::table('tags')->insert([
            'name' => "Utrecht"
        ]);

        DB::table('tags')->insert([
            'name' => "Art"
        ]);

        DB::table('tags')->insert([
            'name' => "Architecture"
        ]);

        DB::table('tags')->insert([
            'name' => "Food"
        ]);

        DB::table('tags')->insert([
            'name' => "Leisure time"
        ]);

        DB::table('tags')->insert([
            'name' => "Memes"
        ]);

        DB::table('tags')->insert([
            'name' => "Coding"
        ]);

        DB::table('tags')->insert([
            'name' => "Inspiration"
        ]);

        DB::table('tags')->insert([
            'name' => "Design"
        ]);

        DB::table('tags')->insert([
            'name' => "Fashion"
        ]);
    }
}