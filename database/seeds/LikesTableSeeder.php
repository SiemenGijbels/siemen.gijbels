<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 1/4/18
 * Time: 6:56 PM
 */


use Illuminate\Database\Seeder;
use League\Csv\Reader;

class LikesTableSeeder extends Seeder
{
    public function run()
    {
        $path = resource_path() .'/postSeed/likes.csv';
        $reader = Reader::createFromPath($path, 'r');

        $records = $reader->getRecords(['post_id', 'user_id']);
        foreach ($records as $offset => $record) {
            var_export($record);

            DB::table('likes')->insert([
                'post_id' => $record['post_id'],
                'user_id' => $record['user_id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}