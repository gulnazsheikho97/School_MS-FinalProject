<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public function Specializations()
    {
        return $this->belongsTo(Specialization::class,'Specialization_id');

    }

    public function Genders()
    {
        return $this->belongsTo(Gender::class,'Gender_id');

    }
}
