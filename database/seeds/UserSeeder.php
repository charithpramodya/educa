<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        DB::table('users')->insert([
            'name' =>'Admin',
            'email' => 'admin@educa.lk',
            'fid' => $faker->unique()->sha1,
            'type' => 'ADMIN',
            'password' =>  Hash::make('3duc4&'),
            

        ]);
    }
}
