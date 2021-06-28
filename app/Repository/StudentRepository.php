<?php
namespace App\Repository;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\BloodType;
use App\Http\Requests\StoreClassesroom;
use App\Http\Requests\StoreStudents;
use Exception;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface{

    public function Create_Student(){

        $data['my_grades'] = Grade::all();
        $data['list_classes'] = Classroom::all();
        $data['list_sections'] = Section::all();
        // $data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = BloodType::all();
        return view('pages.Students.add',$data);

     }

    public function Store_Student(StoreStudents $request){

        try {
            $students = new Student();
            $students->student_name = ['en' => $request->student_name_en, 'ar' => $request->student_name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            //$students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('students.create');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
