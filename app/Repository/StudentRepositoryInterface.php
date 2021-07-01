<?php

namespace App\Repository;

use App\Http\Requests\StoreClassesroom;
use App\Http\Requests\StoreStudents;

interface StudentRepositoryInterface{


    // Get Add Form Student
    public function Create_Student();

    //Store_Student
    public function Store_Student(StoreStudents $request);

    // Get_Student
    public function Get_Student();

    // Edit_Student
    public function Edit_Student($id);

    // Show_Student
    public function Show_Student($id);

    //Update_Student
    public function Update_Student(StoreStudents $request);

    //Delete_Student
    public function Delete_Student($request);




}
