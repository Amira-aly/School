<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Fee_invoice extends Model
{
    protected $table = 'fee_invoices';
    protected $fillable=['invoice_date','student_id','level_id','classroom_id','fee_id','amount','description'];
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }
}
