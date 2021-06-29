<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class My_Parent extends Model
{
    use HasFactory;
    use HasTranslations;//use spatie package for translate column
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];//the field i want to translate
    protected $guarded=[];//accept all field from the form(insted on $fillable)
}
