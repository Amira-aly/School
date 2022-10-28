<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Parentt;
class ParentSeeder extends Seeder
{
    public function run()
    {
        DB::table('parentts')->delete();
        Parentt::create([
            'email' => 'ali@go.com',
            'password' => '12345678',
            'name_father' => ['en'=> 'Ali','ar'=> 'علي'],
            'national_father' => '6789658764',
            'passport_father' => '6789658764',
            'phone_father' => '6789658764',
            'job_father' => ['en'=> 'doctor','ar'=> 'دكتور'],
            'nationality_father_id' => '3',
            'religion_father_id' => '1',
            'address_father' => '6 st Ain shams',
            'name_mother' => ['en'=> 'Fatma','ar'=> 'فاطمة'],
            'national_mother' => '6564356783',
            'passport_mother' => '6564356783',
            'phone_mother' => '6564356783',
            'job_mother' => ['en'=> 'no','ar'=> 'لا عمل'],
            'nationality_mother_id' => '6',
            'religion_mother_id' => '1',
            'address_mother' => '6 st Ain shams'
        ]);
        Parentt::create([
            'email' => 'ahmed@go.com',
            'password' => '12345678',
            'name_father' => ['en'=> 'Ahmed','ar'=> 'احمد'],
            'national_father' => '6786658764',
            'passport_father' => '6786658764',
            'phone_father' => '6786658764',
            'job_father' => ['en'=> 'doctor','ar'=> 'دكتور'],
            'nationality_father_id' => '3',
            'religion_father_id' => '1',
            'address_father' => '6 st Ain shams',
            'name_mother' => ['en'=> 'Fatma','ar'=> 'فاطمة'],
            'national_mother' => '6566756783',
            'passport_mother' => '6566756783',
            'phone_mother' => '6566756783',
            'job_mother' => ['en'=> 'no','ar'=> 'لا عمل'],
            'nationality_mother_id' => '6',
            'religion_mother_id' => '1',
            'address_mother' => '6 st Ain shams'
        ]);
    }
}
