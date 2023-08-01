<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(['id(PK)' =>
        'usename' =>
        'maii' =>
        'password' =>
        'bio' =>
        'image' =>]);
    }
}
