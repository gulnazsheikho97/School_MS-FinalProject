<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['student_name'];
    protected $guarded =[];

    // Relation one to many with gender
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    // Relation one to many with Nationality
    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_id');
    }

    // Relation one to many with parents
    public function myparent()
    {
        return $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }


    // Relation one to many with BloodType
    public function BloodType()
    {
        return $this->belongsTo('App\Models\BloodType', 'blood_id');
    }



    // Relation one to many with grades
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

    // Relation one to many with classes
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }

    // Relation one to many with  sections
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    //  Relation one to many with  images
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
