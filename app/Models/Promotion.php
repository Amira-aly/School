<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Promotion extends Model
{
    protected $table = 'promotions';
    protected $fillable = ['student_id','from_level','from_classroom','from_section','to_level','to_classroom','to_section','academic_year','academic_year_new'];

    public function p_student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function f_level()
    {
        return $this->belongsTo(level::class, 'from_level');
    }

    public function f_classroom()
    {
        return $this->belongsTo(Classroom::class, 'from_classroom');
    }

    public function f_section()
    {
        return $this->belongsTo(Section::class, 'from_section');
    }

    public function t_level()
    {
        return $this->belongsTo(level::class, 'to_level');
    }

    public function t_classroom()
    {
        return $this->belongsTo(Classroom::class, 'to_classroom');
    }

    public function t_section()
    {
        return $this->belongsTo(Section::class, 'to_section');
    }
}
