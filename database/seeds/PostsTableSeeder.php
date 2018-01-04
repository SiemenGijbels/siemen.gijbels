<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = resource_path() .'/postSeed/postseed.csv';
        $reader = Reader::createFromPath($path, 'r');

        $records = $reader->getRecords(['title', 'content', 'image', 'user_id']);
        foreach ($records as $offset => $record) {
            var_export($record);

            DB::table('posts')->insert([
                'title' => $record['title'],
                'content' => $record['content'],
                'image' => $record['image'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'user_id' => $record['user_id'],
            ]);
        }
    }
}