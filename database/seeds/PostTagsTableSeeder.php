<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 1/4/18
 * Time: 6:56 PM
 */


use Illuminate\Database\Seeder;
use League\Csv\Reader;

class PostTagsTableSeeder extends Seeder
{
    public function run()
    {
        $path = resource_path() .'/postSeed/posttag.csv';
        $reader = Reader::createFromPath($path, 'r');

        $records = $reader->getRecords(['post_id', 'tag_id']);
        foreach ($records as $offset => $record) {
            var_export($record);

            DB::table('post_tags')->insert([
                'post_id' => $record['post_id'],
                'tag_id' => $record['tag_id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}