<?php
use Illuminate\Database\Seeder;
use App\Models\Fee;
use Illuminate\Support\Facades\DB;
class FeeSeeder extends Seeder
{
    public function run()
    {
        DB::table('fees')->delete();
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '1',
            'classroom_id' => '1',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '1',
            'classroom_id' => '1',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '1',
            'classroom_id' => '2',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '1',
            'classroom_id' => '2',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '1',
            'classroom_id' => '3',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '1',
            'classroom_id' => '3',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '1',
            'classroom_id' => '4',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '1',
            'classroom_id' => '4',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '1',
            'classroom_id' => '5',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '1',
            'classroom_id' => '5',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '1',
            'classroom_id' => '6',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '1',
            'classroom_id' => '6',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '2',
            'classroom_id' => '1',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '2',
            'classroom_id' => '1',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '2',
            'classroom_id' => '2',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '2',
            'classroom_id' => '2',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '2',
            'classroom_id' => '3',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '2',
            'classroom_id' => '3',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '3',
            'classroom_id' => '1',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '3',
            'classroom_id' => '1',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '3',
            'classroom_id' => '2',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '3',
            'classroom_id' => '2',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'bus','ar'=> 'باص'],
            'amount' => '2000',
            'level_id' => '3',
            'classroom_id' => '3',
            'description' => 'مصاريف باص للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
        Fee::create([
            'title' => ['en'=> 'study','ar'=> 'مصاريف دراسية'],
            'amount' => '8000',
            'level_id' => '3',
            'classroom_id' => '3',
            'description' => 'مصاريف دراسية للسنة كلها',
            'year' => '2022',
            'fee_type' => '2',
        ]);
    }
}
