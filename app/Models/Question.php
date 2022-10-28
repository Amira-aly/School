<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
    protected $fillable=['title','answers','right_answer','score','exam_id'];

    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
}
