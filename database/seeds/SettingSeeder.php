<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->delete();
        $data = [
            ['key' => 'current_session', 'value' => '2022-2023'],
            ['key' => 'school_title', 'value' => 'AA'],
            ['key' => 'school_name', 'value' => 'Amira Ali International Schools'],
            ['key' => 'end_first_term', 'value' => '01-12-2022'],
            ['key' => 'end_second_term', 'value' => '01-03-2023'],
            ['key' => 'phone', 'value' => '01101572987'],
            ['key' => 'address', 'value' => 'Cairo'],
            ['key' => 'school_email', 'value' => 'amira.ali.web@gmail.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];
        DB::table('settings')->insert($data);
    }
}
