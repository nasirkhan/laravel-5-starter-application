<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
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
        $model = '\App\Role';

        // Table
        $table = 'permission_role';

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
        App\Role::findOrFail(1)->permissions()->attach(1);
        App\Role::findOrFail(1)->permissions()->attach(2);
        App\Role::findOrFail(1)->permissions()->attach(3);

        // 2
        App\Role::findOrFail(2)->permissions()->attach(2);


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
