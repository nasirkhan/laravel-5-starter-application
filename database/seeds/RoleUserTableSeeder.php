<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
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
        $table = 'role_user';

        /**
         * TODO: Need to setup a config to enable and disable truncate
         */
        
        // truncate Role table
        if (config('database.default') == 'mysql') {
            DB::table($table)->truncate();
        }

        

        /**
         * 
         * Attach Role - User
         * 
         * --------------------------------------
         */
        
        // 1
        App\User::findOrFail(1)->roles()->attach(1);
        
        // 2
        App\User::findOrFail(2)->roles()->attach(2);


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
