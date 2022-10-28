<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class teacher_section extends Model
{
    protected $table = 'teacher_sections';
    protected $fillable = ['teacher_id','section_id'];
}
