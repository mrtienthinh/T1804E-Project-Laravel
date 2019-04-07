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
        DB::table('users')->delete();

        $faker = \Faker\Factory::create();

        DB::table('users')->insert([
            [
                'name' => "Tien Thinh",
                'slug' => 'tien-thinh',
                'email' => "thinh@thinh.com",
                'password' => bcrypt('123123'),
                'bio' => $faker->text(rand(250, 300)),
                'role_id' => 1,
            ],
            [
                'name' => "Thanh Dat",
                'slug' => 'thanh-dat',
                'email' => "dat@dat.com",
                'password' => bcrypt('123123'),
                'bio' => $faker->text(rand(250, 300)),
                'role_id' => 1,
            ],
            [
                'name' => "Quang Thanh",
                'slug' => 'quang-thanh',
                'email' => "thanh@thanh.com",
                'password' => bcrypt('123123'),
                'bio' => $faker->text(rand(250, 300)),
                'role_id' => 1,
            ],
        ]);
    }
}
