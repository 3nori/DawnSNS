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
        DB::table('users')->insert([
        'id(PK)' =>'Minori510',
        'usename' =>'さのみん',
        'maii' =>'mino.note@gmail.com',
        'password' =>'minori510',
        'bio' =>'',
        'image' =>'',
    ]);
    }
}
