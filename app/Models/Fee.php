<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Fee extends Model
{
    use HasTranslations;
    protected $table = 'fees';
    public $translatable = ['title'];
    protected $fillable=['title','amount','level_id','classroom_id','description','year','fee_type'];

    public function level()
    {
        return $this->belongsTo(level::class, 'level_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
