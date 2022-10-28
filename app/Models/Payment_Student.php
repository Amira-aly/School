<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Payment_Student extends Model
{
    protected $table = 'payment_students';
    protected $fillable = ['date','student_id','amount','description'];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
