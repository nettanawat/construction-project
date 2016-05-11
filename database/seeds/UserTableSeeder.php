<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = "Test";
        $user->email = "test@gmail.com";
        $user->password = bcrypt("123456");
        $user->save();

        //or

        DB::table('users')->insert(
            array(
                array(
                    'name' => 'john',
                    'email' => 'john@gmail.com',
                    'password' => bcrypt("123456")
                ),
                array(
                    'name' => 'smith',
                    'email' => 'smith@gmail.com',
                    'password' => bcrypt("123456")
                ),
                array(
                    'name' => 'calvin',
                    'email' => 'calvin@gmail.com',
                    'password' => bcrypt("123456")
                ),
            )
        );
    }
}
