<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(User_adminsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
