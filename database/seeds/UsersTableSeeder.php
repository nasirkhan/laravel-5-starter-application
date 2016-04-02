<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('users')->insert([
            'name' => 'Admin Istrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
            'token' => md5(uniqid(mt_rand(), true)),
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('users')->insert([
            'name' => 'General User',
            'email' => 'user@user.com',
            'password' => bcrypt('1234'),
            'token' => md5(uniqid(mt_rand(), true)),
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }

}
