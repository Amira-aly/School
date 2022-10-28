<?php
use Illuminate\Database\Seeder;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
class ClassroomSeeder extends Seeder
{
    public function run()
    {
        DB::table('classrooms')->delete();
        Classroom::create([
            'name' => ['en'=> 'Level 1','ar'=> 'اولى'],
            'level_id' => '1'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 2','ar'=> 'تانية'],
            'level_id' => '1'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 3','ar'=> 'تالتة'],
            'level_id' => '1'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 4','ar'=> 'رابعة'],
            'level_id' => '1'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 5','ar'=> 'خامسة'],
            'level_id' => '1'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 6','ar'=> 'سادسة'],
            'level_id' => '1'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 1','ar'=> 'اولى'],
            'level_id' => '2'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 2','ar'=> 'تانية'],
            'level_id' => '2'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 3','ar'=> 'تالتة'],
            'level_id' => '2'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 1','ar'=> 'اولى'],
            'level_id' => '3'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 2','ar'=> 'تانية'],
            'level_id' => '3'
        ]);
        Classroom::create([
            'name' => ['en'=> 'Level 3','ar'=> 'تالتة'],
            'level_id' => '3'
        ]);
    }
}
