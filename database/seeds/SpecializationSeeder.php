<?php
use Illuminate\Database\Seeder;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
class SpecializationSeeder extends Seeder
{
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Maths', 'ar'=> 'رياضيات'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'studies', 'ar'=> 'دراسات'],
            ['en'=> 'Music', 'ar'=> 'موسيقي']
        ];
        foreach ($specializations as $S) {
            Specialization::create(['name' => $S]);
        }
    }
}
