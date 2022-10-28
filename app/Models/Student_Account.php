<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student_Account extends Model
{
    protected $table = 'student_accounts';
    protected $fillable=['date','type','fee_invoice_id','receipt_id','processing_id','payment_id','student_id','level_id','classroom_id','debit','credit','description'];
}
