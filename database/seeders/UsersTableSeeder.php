<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Kazmi',
                'email' => 'sydabdrehman@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DG7vJu8YTmCvOfS0JDxYseZZOem2sW.h3wepTjHV5GMpsQ/Bv7xHi',
                'remember_token' => 'F8poPGkbyqQVMea9HiKE4BfERh1RRdvb4pvyL9nUEkQTAuTqHdEqe1xPOwSf',
                'created_at' => '2019-09-28 05:27:36',
                'updated_at' => '2019-09-28 05:27:36',
            ),
        ));


    }
}