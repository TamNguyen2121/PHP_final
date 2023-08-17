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
            ['id'=>1,'username'=>'Admin','emai'=>'admin@gmail.com','password'=>$password,'image'=>'',]
        ];
        Account::insert($AccountRecords);
    }
}
