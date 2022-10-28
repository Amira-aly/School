<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Amira Ali',
            'email' => 'amira@go.com',
            'password' => Hash::make('12345678'),
        ]);

    }
}
