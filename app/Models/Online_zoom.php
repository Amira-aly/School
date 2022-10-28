<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Online_zoom extends Model
{
    public $fillable= ['integration','level_id','classroom_id','section_id','created_by','meeting_id','topic','start_at','duration','password','start_url','join_url'];

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

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'created_by');
    }
}
