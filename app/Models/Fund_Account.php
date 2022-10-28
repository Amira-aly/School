<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Fund_Account extends Model
{
    protected $table = 'fund_accounts';
    protected $fillable=['date','receipt_id','payment_id','debit','credit','description'];
    public function receipt_student()
    {
        return $this->belongsTo(Receipt_Student::class,'receipt_id');
    }

    public function payment_student()
    {
        return $this->belongsTo(Payment_student::class,'payment_id');
    }
}
