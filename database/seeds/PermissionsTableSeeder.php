<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class PermissionsTableSeeder extends Seeder
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
        $model = '\App\Permission';
        
        // Table
        $table = 'permissions';

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
        $admin->name = 'view-backend';
        $admin->label = 'view-backend';
        $admin->created_at = Carbon::now();
        $admin->updated_at = Carbon::now();
        $admin->save();

        //id = 2
        $admin = new $model;
        $admin->name = 'create-users';
        $admin->label = 'create-users';
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
