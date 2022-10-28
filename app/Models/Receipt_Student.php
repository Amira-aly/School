<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Receipt_Student extends Model
{
    protected $table = 'receipt_students';
    protected $fillable = ['date','student_id','debit','description'];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
