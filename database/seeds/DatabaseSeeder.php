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
//        DB::table('users')->insert(
//            [
//                'name' => 'Ngô Minh Thư',
//                'email' => 'ngominhthu1611@gmail.com',
//                'password' => bcrypt('1611')
//            ]
//        );
        DB::table('users')->insert(
            [
                'name' => 'Thuận Béo',
                'email' => 'hjtshort@gmail.com',
                'password' => bcrypt('321136263'),
                'sex'=>1,
                'avatar'=>'thuan.jpg',
                'phone'=>'01692780767',
                'address'=>'Cần Thơ',
                'isAdmin'=>1,
            ]
        );
        DB::table('property')->insert(
            [
                [
                    'property_name' => 'Bán',
                ],
                [
                    'property_name' => 'Cho thuê',
                ],
                [
                    'property_name' => 'Dự án',
                ]
            ]
        );
        DB::table('direction')->insert(
            [
                [
                    'direction_name' => 'Hướng Đông Bắc',
                ],
                [
                    'direction_name' => 'Hướng Bắc',
                ],
                [
                    'direction_name' => 'Hướng Nam',
                ],
                [
                    'direction_name' => 'Hướng Tây',
                ],
                [
                    'direction_name' => 'Hướng Đông',
                ],
                [
                    'direction_name' => 'Hướng Đông Nam',
                ],
                [
                    'direction_name' => 'Hướng Tây Bắc',
                ],
                [
                    'direction_name' => 'Hướng Tây Nam',
                ]
            ]
        );
        DB::table('type')->insert(
            [
                [
                    'type_name' => 'Nhà mặt tiền'
                ],
                [
                    'type_name' => 'Hẻm'
                ]
            ]
        );
    }
}
