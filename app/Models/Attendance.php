<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = ['student_id','level_id','classroom_id','section_id','teacher_id','attendence_date','attendence_status'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function level()
    {
        return $this->belongsTo(level::class, 'level_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
