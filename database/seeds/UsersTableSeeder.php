<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $path = resource_path() .'/postSeed/userseed.csv';
        $reader = Reader::createFromPath($path, 'r');

        $records = $reader->getRecords(['name', 'email', 'password', 'type', 'avatar']);
        foreach ($records as $offset => $record) {
            var_export($record);

            DB::table('users')->insert([
                'name' => $record['name'],
                'email' => $record['email'],
                'password' => bcrypt($record['password']),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'type' => $record['type'],
                'avatar' => $record['avatar'],
            ]);
        }
    }
}