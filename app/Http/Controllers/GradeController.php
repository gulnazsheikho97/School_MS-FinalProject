<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function ShowGrades(){
        return view('pages.Grades.Grade');
    }
}
