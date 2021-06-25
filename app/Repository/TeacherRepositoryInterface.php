<?php
namespace App\Repository;

use App\Http\Requests\StoreClassesroom;
use App\Http\Requests\StoreTeachers;

interface TeacherRepositoryInterface{

    // get all Teachers
    public function getAllTeachers();

    // Get specialization
    public function Getspecialization();

    // Get Gender
    public function GetGender();

    // StoreTeachers
    public function StoreTeachers(StoreTeachers $request);

    // StoreTeachers
    public function editTeachers($id);

    // UpdateTeachers
    public function UpdateTeachers(StoreTeachers $request);

    // DeleteTeachers
    public function DeleteTeachers($request);

}


