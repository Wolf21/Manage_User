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
        DB::table('users')->insert([
            'user_id' => str_random(10),
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => bcrypt('secret'),
        ]);
        for ($i=1 ; $i<=10 ; $i++){
            DB::table('users')->insert([
                'user_id' => str_random(10),
                'user_name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'role' => rand(0,1),
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
