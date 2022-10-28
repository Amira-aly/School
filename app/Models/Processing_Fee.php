<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Processing_Fee extends Model
{
    protected $table = 'processing_fees';
    protected $fillable = ['date','student_id','amount','description'];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
