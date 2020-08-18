<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Inserindo valores fakes sem a utilização do Factory com Faker */
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@mendouce.com',
        //     'password' => Hash::make('password')
        // ]);

        /** Inserido valores através do Factory */
        factory(\App\User::class, 3)->create();
    }
}
