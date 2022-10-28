<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Subject extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name','level_id','classroom_id','teacher_id'];
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
