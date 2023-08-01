<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
        'id(PK)' =>'',
        'usename' =>'Minori510',
        'maii' =>
        'password' =>
        'bio' =>
        'image' =>]);
    }
}
