<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $datas=DB::select(
            "SELECT name, email, phone
            FROM users
            WHERE role_id <> 1"
            );

        $users[]=['No','username','email address','phone number'];

    	foreach($datas as $key => $data){
    		$users[]=[$key+1, $data->name, $data->email, $data->phone];
    	}
        return collect($users);
    }
}
