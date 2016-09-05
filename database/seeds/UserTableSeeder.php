<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        for($i = 0; $i < 30; $i++)
        {

        $id = \DB::table('users')->insertGetId(array(

            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => $faker->unique()->email,
            'password' => \Hash::make('secret'),
            'type' => 'user'

        ));

        \DB::table('user_profiles')->insert(array(

            'bio' => $faker->paragraph,
            'twitter' => 'http://www.twitter.com/' . $faker->userName,
            'web' => $faker->unique()->url,
            'user_id' => $id

        ));
        }
    }
}
