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
        $path = resource_path() .'/postSeed/seed.csv';
        $reader = Reader::createFromPath($path, 'r');

        $records = $reader->getRecords(['title', 'content']);
        foreach ($records as $offset => $record) {
            //$offset : represents the record offset
            //var_export($record) returns something like
            // array(
            //  'john',
            //  'doe',
            //  'john.doe@example.com'
            // );
            var_export($record);

            DB::table('posts')->insert([
                'title' => $record['title'],
                'content' => $record['content'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }

//        for ($i = 0; $i <= 10; $i++) {
//            DB::table('posts')->insert([
//                'title' => str_random(10),
//                'content' => str_random(20),
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s")
//            ]);
//        }


    }

}