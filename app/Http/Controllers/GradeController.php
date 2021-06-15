<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Dotenv\Result\Success;

class GradeController extends Controller
{
    public function index(){
        $Grades=Grade::all();
        return view('pages.Grades.Grade' , ['Grades'=>$Grades]);
    }

    public function store(StoreGrades $request)
    {
        if (Grade::where('name->ar', $request->name)->orWhere('name->en',$request->name_en)->exists()) {

            return redirect()->back()->withErrors(trans('Grades_trans.exists'));//make grades unique
        }

        try {
            $validated = $request->validated();
            $Grade = new Grade();
            /*
            $translations = [
                'en' => $request->Name_en,
                'ar' => $request->Name
            ];
            $Grade->setTranslations('Name', $translations);
            */
            $Grade->name = ['en' => $request->name_en, 'ar' => $request->name];
            $Grade->notes = $request->notes;
            $Grade->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('grades.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
/**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function update(StoreGrades $request)
 {
   try {
       $validated = $request->validated();
       $Grades = Grade::findOrFail($request->id);
       $Grades->update([
         $Grades->name = ['ar' => $request->name, 'en' => $request->name_en],
         $Grades->notes = $request->notes,
       ]);
       toastr()->success(trans('messages.Update'));
       return redirect()->route('grades.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }
 }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function destroy(Request $request)
   {

     $Grades = Grade::findOrFail($request->id)->delete();
     toastr()->error(trans('messages.Delete'));
     return redirect()->route('grades.index');

   }
}

?>
