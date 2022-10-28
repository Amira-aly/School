<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teacher extends Authenticatable
{
    use HasTranslations;
    protected $table = 'teachers';
    public $translatable = ['name'];
    protected $fillable = ['email','password','name','specialization_id','gender_id','joining_date','address'];
    public function specialization(){
        return $this->belongsTo(specialization::class , 'specialization_id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class , 'gender_id');
    }

    public function sections()
    {
        return $this->belongsToMany(section::class,'teacher_sections');
    }
}
