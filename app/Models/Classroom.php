<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name_class'];

    protected $fillable=['name_class','grade_id'];
    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo(Grade::class,'grade_id');

    }
        ////many to one relashionshep between sections and Classes
        public function class_Section(){
            return $this->hasMany( 'App\Models\Section', 'class_id');
        }
}
