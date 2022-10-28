<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table="libraries";
    protected $fillable = ['title','file_name','level_id','classroom_id','section_id','teacher_id'];

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

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

}
