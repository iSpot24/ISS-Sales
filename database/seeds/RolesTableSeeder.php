<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('roles')->truncate();

        factory(\App\Role::class)->create(['role_name' => strtoupper('usr')]);

        factory(\App\Role::class)->create(['role_name' => strtoupper('adm')]);
    }
}
