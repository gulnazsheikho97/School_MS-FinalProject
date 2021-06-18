<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassesroom;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $My_Classes =Classroom::all();
    $Grades=Grade::all();
     return view('pages.My_Classes.My_Classes', ['Grades'=>$Grades,'My_Classes'=>$My_Classes]);
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
    public function store(StoreClassesroom $request)
    {

        $List_Classes = $request->List_Classes;

        try {

            foreach ($List_Classes as $List_Class) {

                $My_Classes = new Classroom();

                $My_Classes->name_class= ['en' => $List_Class['name_class_en'], 'ar' => $List_Class['name_class']];

                $My_Classes->grade_id = $List_Class['grade_id'];

                $My_Classes->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $Classrooms = Classroom::findOrFail($request->id);

            $Classrooms->update([

                $Classrooms->name_class = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Classrooms->grade_id = $request->grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('classrooms.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('classrooms.index');
    }
}
