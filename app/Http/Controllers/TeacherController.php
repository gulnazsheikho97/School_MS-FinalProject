<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeachers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)//call the interface
    {
        $this->Teacher = $Teacher;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Teachers=$this->Teacher->getAllTeachers();
     // return view('pages.Teachers.Teachers',compact('Teachers'));
      return view('pages.Teachers.Teachers',['Teachers'=>$Teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $specializations = $this->Teacher->Getspecialization();
         $genders = $this->Teacher->GetGender();
         return view('pages.Teachers.create',['specializations'=> $specializations,'genders'=>$genders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeachers $request)
    {
        return $this->Teacher->StoreTeachers($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
   /* public function show(Teacher $teacher)
   // {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('pages.Teachers.edit' , ['Teachers'=>$Teachers ,'specializations'=> $specializations,'genders'=>$genders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeachers $request)
    {
        return $this->Teacher->UpdateTeachers($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       return $this->Teacher->DeleteTeachers($request);
    }
}
