<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;
use Hash;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $AccountRecords = [
            ['id'=>1,'username'=>'admin','type'=>'admin','email'=>'admin@gmail.com','password'=>$password,'mobile'=>9876543210,'image'=>'','status'=>1],
            // ['id'=>2,'username'=>'Subadmin1','type'=>'subadmin','email'=>'subadmin1@gmail.com','password'=>$password,'mobile'=>9876543200,'image'=>'','status'=>1],
            // ['id'=>3,'username'=>'Subadmin2','type'=>'subadmin','email'=>'subadmin3@gmail.com','password'=>$password,'mobile'=>9876543000,'image'=>'','status'=>1]

        ];
        Account::insert($AccountRecords);
    }
}
