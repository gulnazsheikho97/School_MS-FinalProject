<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];

    protected $fillable=['name','notes'];
    protected $table = 'Grades';
    public $timestamps = true;

    ////many to one relashionshep between sections and Grades
    public function Sections(){
        return $this->hasMany( 'App\Models\Section', 'grade_id');
    }
}
