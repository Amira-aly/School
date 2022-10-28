<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Authenticatable
{
    use HasTranslations;
    use SoftDeletes;
    protected $table = 'students';
    public $translatable = ['name'];
    protected $fillable = ['name','email','password','gender_id','nationality_id','date_birth','level_id','classroom_id','section_id','parent_id','academic_year','deleted_at'];
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function parent()
    {
        return $this->belongsTo(Parentt::class, 'parent_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class, 'student_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }



}
