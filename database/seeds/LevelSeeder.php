<?php
use Illuminate\Database\Seeder;
use App\Models\level;
use Illuminate\Support\Facades\DB;
class LevelSeeder extends Seeder
{
    public function run()
    {
        DB::table('levels')->delete();
        Level::create([
            'name' => ['en'=> 'Primary','ar'=> 'ابتدائي'],
            'notes' => 'no'
        ]);
        Level::create([
            'name' => ['en'=> 'Preparatory','ar'=> 'اعدادى'],
            'notes' => 'no'
        ]);
        Level::create([
            'name' => ['en'=> 'Secondary','ar'=> 'ثانوى'],
            'notes' => 'no'
        ]);
    }
}
