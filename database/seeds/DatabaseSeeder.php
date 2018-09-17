<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
    }
}
class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'=>'Ngô Minh Thư',
                'email'=>'ngominhthu1611@gmail.com',
                'password'=>bcrypt('1611')
            ]
        );
    }
}