<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $student = Student::OrderBy('id','asc')->paginate(4);
        return view('student.index',compact('student')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('student.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $student = new Student();

        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->country = $request->input('country');
        $student->city = $request->input('city');
        $student->gender = $request->input('gender');
        $student->address = $request->input('address');
        // echo "<pre>";
        // print_r($student);
        // exit;
         $student->save();
        // student::create($student);
        // return view('student.index',compact('data'));
        return redirect()->route('student.index')->with('success','Student Inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        $student = Student::all();
        return view('student.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $student = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'country' => $request->country,
            'city' => $request->city,
            'gender' => $request->input('gender'),
            'address' => $request->address
             );
        // echo "<pre>";
        // print_r($student);
        // exit;

        student::findOrfail($request->student_id)->update($student);
        // return view('student.index',compact('data'));
        return redirect()->route('student.index')->with('success','Student Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $student)
    {
        $delete = $student->all();

        // echo "<pre>";
        // print_r($delete);
        // exit;
     $deletestudent = student::findOrfail($student->student_id);
      $deletestudent->delete();  
     return redirect()->route('student.index')->with('success','Student Deleted successfully!');
    }
}
