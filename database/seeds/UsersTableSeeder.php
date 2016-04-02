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
        // disable mysql foreigh key check
        if (config('database.default') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }
        
        /**
         * Setup config
         */
        // Model
        $model = '\App\User';
        
        // Table
        $table = 'users';
        
        /**
         * TODO: Need to setup a config to enable and disable truncate
         */
        
        // truncate Role table
        if (config('database.default') == 'mysql') {
            DB::table($table)->truncate();
        }

        /**
         * 
         * Insert Data
         * 
         * --------------------------------------
         */
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
        
         /**
         * 
         * END - Insert Data
         * 
         * --------------------------------------
         * --------------------------------------
         */
        
        // enable mysql foreigh key check
        if (config('database.default') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

    }

}
