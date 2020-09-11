<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'admin',
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'buyer',
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'seller',
        ]);
    }
}
