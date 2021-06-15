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
}
