<?php
use Illuminate\Database\Seeder;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;
class GenderSeeder extends Seeder
{
    public function run()
    {
        DB::table('genders')->delete();

        $genders = [
            ['en'=> 'Male', 'ar'=> 'ذكر'],
            ['en'=> 'Female', 'ar'=> 'انثي'],

        ];
        foreach ($genders as $ge) {
            Gender::create(['name' => $ge]);
        }
    }
}
