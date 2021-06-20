<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSections;
use App\Models\Section;
use App\Models\Classroom;
use App\Models\Grade;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();

        $list_Grades = Grade::all();

        $Classromms = Classroom::with(['class_Section'])->get();

        $list_classes = Classroom::all();

        return view('pages.Sections.Sections',['Grades'=>$Grades,'List_Grades'=>$list_Grades,'Classromms'=>$Classromms,'list_classes'=>$list_classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSections $request)
    {
        try {

            $validated = $request->validated();
            $Sections = new Section();

            $Sections->section_name = ['ar' => $request->section_name_Ar, 'en' => $request->section_name_En];
            $Sections->grade_id = $request->grade_id;
            $Sections->class_id = $request->class_id;
            $Sections->Status = 1;
            $Sections->save();
            toastr()->success(trans('messages.success'));

            return redirect()->route('sections.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

/*
  public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");

        return $list_classes;
    }
    */
}
