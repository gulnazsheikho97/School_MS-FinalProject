<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable=['section_name'];
    protected $fillable=['section_name','grade_id','class_id'];
    protected $table = 'sections';
    public $timestamps = true;

    //one to many relashionshep between sections and classes
    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classroom', 'class_id');
    }
    //many to many relation with Teacher
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section');
    }
}
