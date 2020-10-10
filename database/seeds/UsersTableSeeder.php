<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Super Admin',
            'email' => 'influencerpulse@gmail.com',
            'brandname' => 'admin',

            'address1'=>' ',
            'address2'=>' ',
            'zip_code'=>123456,
            'country'=>'India',
            'state'=>864,
            'city'=>' ',
            'time_zone'=>'India Standard Time',
            'image'=>' ',
            'key_update_status'=>1,
            'claimed_status'=>1,
            'approval_status'=>1,
            'lastet_status'=>1,
            'purchase_status'=>1,

            'role_id' => 1,
            'mail_verify' =>1,
            'password' => bcrypt('@naveed@123'),
        ]);

        // DB::table('users')->insert([
        //     'id' => 2,
        //     'name' => 'buyer',
        //     'brandname' => 'buyer',
        //
        //     'address1'=>' ',
        //     'address2'=>' ',
        //     'zip_code'=>123456,
        //     'country'=>'RU',
        //     'state'=>485,
        //     'city'=>' ',
        //     'time_zone'=>'Europe_Russia',
        //     'image'=>' ',
        //     'key_update_status'=>1,
        //     'claimed_status'=>1,
        //     'approval_status'=>1,
        //     'lastet_status'=>1,
        //     'purchase_status'=>1,
        //
        //     'email' => 'buyer@buyer.com',
        //     'role_id' => 2,
        //     'mail_verify' =>1,
        //     'password' => bcrypt('buyer'),
        // ]);
        //
        // DB::table('users')->insert([
        //     'id' => 3,
        //     'name' => 'seller',
        //     'brandname' => 'seller',
        //
        //     'address1'=>' ',
        //     'address2'=>' ',
        //     'zip_code'=>123456,
        //     'country'=>'US',
        //     'state'=>184,
        //     'city'=>' ',
        //     'time_zone'=>'Europe_Russia',
        //     'image'=>' ',
        //     'key_update_status'=>1,
        //     'claimed_status'=>1,
        //     'approval_status'=>1,
        //     'lastet_status'=>1,
        //     'purchase_status'=>1,
        //
        //     'email' => 'seller@seller.com',
        //     'role_id' => 3,
        //     'mail_verify' =>1,
        //     'password' => bcrypt('seller'),
        // ]);

    }
}
