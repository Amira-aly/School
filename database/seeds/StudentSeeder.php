<?php
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
class StudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->delete();
        Student::create([
            'name' => ['en'=> 'ahmed','ar'=> 'احمد'],
            'email' => 'medo@go.com',
            'password' => '12345678',
            'gender_id' => '1',
            'nationality_id' => '3',
            'date_birth' => '2022-09-21',
            'level_id' => '1',
            'classroom_id' => '1',
            'section_id' => '1',
            'parent_id' => '1',
            'academic_year' => '2022'
        ]);
        Student::create([
            'name' => ['en'=> 'Mona','ar'=> 'منى'],
            'email' => 'mona@go.com',
            'password' => '12345678',
            'gender_id' => '2',
            'nationality_id' => '3',
            'date_birth' => '2022-09-21',
            'level_id' => '1',
            'classroom_id' => '1',
            'section_id' => '2',
            'parent_id' => '1',
            'academic_year' => '2022'
        ]);
        Student::create([
            'name' => ['en'=> 'Amira','ar'=> 'اميرة'],
            'email' => 'amiraaa@go.com',
            'password' => '12345678',
            'gender_id' => '1',
            'nationality_id' => '4',
            'date_birth' => '2022-09-21',
            'level_id' => '1',
            'classroom_id' => '1',
            'section_id' => '3',
            'parent_id' => '2',
            'academic_year' => '2022'
        ]);
        Student::create([
            'name' => ['en'=> 'mohamed','ar'=> 'محمد'],
            'email' => 'mohamed@go.com',
            'password' => '12345678',
            'gender_id' => '1',
            'nationality_id' => '4',
            'date_birth' => '2022-09-21',
            'level_id' => '2',
            'classroom_id' => '1',
            'section_id' => '1',
            'parent_id' => '2',
            'academic_year' => '2022'
        ]);
        Student::create([
            'name' => ['en'=> 'Hoda','ar'=> 'هدي'],
            'email' => 'hoda@go.com',
            'password' => '12345678',
            'gender_id' => '1',
            'nationality_id' => '4',
            'date_birth' => '2022-09-21',
            'level_id' => '2',
            'classroom_id' => '2',
            'section_id' => '2',
            'parent_id' => '2',
            'academic_year' => '2022'
        ]);
    }
}
