<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Section extends Model
{
    use HasTranslations;
    protected $table = 'sections';
    protected $fillable = ['name','status','level_id','classroom_id'];
    public $translatable = ['name'];
    public $timestamps = true;
    public function level()
    {
        return $this->belongsTo(level::class , 'level_id');
    }

    public function classroom()
    {
        return $this->belongsTo(classroom::class , 'classroom_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_sections');
    }
}
