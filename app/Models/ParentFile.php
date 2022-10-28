<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ParentFile extends Model
{
    protected $table = 'parent_files';
    protected $fillable = ['name_file','parent_id'];
}
