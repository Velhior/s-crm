<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            //'name' => Str::random(10),
            'email' => 'test@test.com',
            //'password' => bcrypt('password'),
        ]);
    }
}
