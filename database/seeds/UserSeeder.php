<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' =>   Uuid::uuid4()->getHex(),
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 1,
            'device_token' => 'NOTOKEN',
            'staff_id' => '999999',
            'first_name' => 'Super',
            'last_name' => 'Admin',
        ]);
    }

}
