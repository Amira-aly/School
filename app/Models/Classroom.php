<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Classroom extends Model
{
    use HasTranslations;
    protected $table = 'classrooms';
    protected $fillable = ['name','level_id'];
    public $translatable = ['name'];
    public function level()
    {
        return $this->belongsTo(level::class , 'level_id');
    }
    public function sections(){
        return $this->hasmany(Section::class , 'classroom_id');
    }
}
