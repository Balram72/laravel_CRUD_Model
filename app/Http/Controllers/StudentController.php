<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function index(){

        $student = Student::all();
        return view('students.index',compact('student'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:students,email',
            'course'=>'required',
            'phone'=>'required|numeric|unique:students,phone',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('StduentPhoto'),$imageName);
        $student  = new Student;
        $student->image = $imageName;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->course = $request->course;        
        $student->phone = $request->phone;       
        $student->save();
            return back()->withSuccess('Student Added Succefully !!');
    }
    public function destroy(Request $request){
        $student_id = $request->input('delete_stud_id');
        $student = Student::find($student_id);
        $student->delete();
        return back()->withSuccess('product Delete !!!!');
    }

    public function edit($id){
        $student = Student::find($id);
            return response()->json([
                'success' => 200,
                'student' => $student,
            
            ]);
    }

    public function update(Request $request){
    $student_id = $request->input('stud_id');
    $student = Student::find($student_id);
     if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('StduentPhoto'),$imageName);
            $student->image = $imageName;
        }
            $student->name = $request->name;
            $student->email = $request->email;
            $student->course = $request->course;        
            $student->phone = $request->phone;  
            $student->save();
              return back()->withSuccess('product Update !!!!');
    }

    
    

}
