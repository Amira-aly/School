<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class level extends Model
{
    use HasTranslations;
    protected $table = 'levels';
    public $translatable = ['name'];
    protected $fillable = ['name','notes'];
    public $timestamps = true;

    public function classrooms(){
        return $this->hasmany(Classroom::class , 'level_id');
    }
    public function sections(){
        return $this->hasmany(Section::class , 'level_id');
    }
}
