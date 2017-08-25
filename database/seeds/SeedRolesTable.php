<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedRolesTable extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                ['role' => 'admin', 'description' => 'manager all functions and users'],
                ['role' => 'manager', 'description' => 'manager all functions'],
                ['role' => 'cashier', 'description' => 'cashier operator'],
                ['role' => 'controller', 'description' => 'stocks and reports'],
            ]
        );
    }
}
