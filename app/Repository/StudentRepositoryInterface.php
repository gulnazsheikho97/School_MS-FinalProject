<?php

namespace App\Repository;

use App\Http\Requests\StoreClassesroom;
use App\Http\Requests\StoreStudents;

interface StudentRepositoryInterface{


    // Get Add Form Student
    public function Create_Student();

    //Store_Student
    public function Store_Student(StoreStudents $request);


}
