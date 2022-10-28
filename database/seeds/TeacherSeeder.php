<?php
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
class TeacherSeeder extends Seeder
{
    public function run()
    {
        DB::table('teachers')->delete();
        Teacher::create([
            'name' => ['en'=> 'Ahmed','ar'=> 'احمد'],
            'email' => 'ahmedd@go.com',
            'password' => '12345678',
            'specialization_id' => '3',
            'gender_id' => '1',
            'joining_date' => '2022-09-21',
            'address' => '6 st Ain shams'
        ]);
    }
}
