<?php
use Illuminate\Database\Seeder;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
class SectionSeeder extends Seeder
{
    public function run()
    {
        DB::table('sections')->delete();
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '1',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '1',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '3'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '3'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '1',
            'classroom_id' => '3'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '4'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '4'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '1',
            'classroom_id' => '4'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '5'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '5'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '1',
            'classroom_id' => '5'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '6'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '1',
            'classroom_id' => '6'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '1',
            'classroom_id' => '6'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '2',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '2',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '2',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '2',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '2',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '2',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '2',
            'classroom_id' => '3'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '2',
            'classroom_id' => '3'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '2',
            'classroom_id' => '3'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '3',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '3',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '3',
            'classroom_id' => '1'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '3',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '3',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '3',
            'classroom_id' => '2'
        ]);
        Section::create([
            'name' => ['en'=> 'First grade','ar'=> 'الصف الاول'],
            'status' => '1',
            'level_id' => '3',
            'classroom_id' => '3'
        ]);
        Section::create([
            'name' => ['en'=> 'Second row','ar'=> 'الصف الثانى'],
            'status' => '1',
            'level_id' => '3',
            'classroom_id' => '3'
        ]);
        Section::create([
            'name' => ['en'=> 'third grade','ar'=> 'الصف الثالث'],
            'status' => '0',
            'level_id' => '3',
            'classroom_id' => '3'
        ]);
    }
}
