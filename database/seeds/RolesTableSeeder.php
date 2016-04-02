<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class RolesTableSeeder extends Seeder {

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
        $model = '\App\Role';
        
        // Table
        $table = 'roles';

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
        
        //Create admin role, id of 1               
        $admin = new $model;
        $admin->name = 'administrator';
        $admin->label = 'Administrator';
        $admin->created_at = Carbon::now();
        $admin->updated_at = Carbon::now();
        $admin->save();

        //id = 2
        $admin = new $model;
        $admin->name = 'user';
        $admin->label = 'User';
        $admin->created_at = Carbon::now();
        $admin->updated_at = Carbon::now();
        $admin->save();

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
