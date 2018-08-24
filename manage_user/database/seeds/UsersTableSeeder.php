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
        for ($i=1 ; $i<=10 ; $i++){
            DB::table('users')->insert([
                'user_id' => str_random(10),
                'first_name' => str_random(10),
                'last_name' => str_random(10),
                'role' => rand(0,1),
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
