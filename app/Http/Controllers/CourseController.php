<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role==='student')
        {
            $courses = DB::table('enrollments')
                ->join('courses', 'enrollments.course_id', '=', 'courses.id')
                ->join('users', function ($join){
                    $join->on('users.id', '=', 'enrollments.user_id')
                        ->where('enrollments.user_id', '=', auth()->user()->id);})
                ->select('courses.*')
                ->get();

            return view('course.index',['courses'=>$courses]);
        }
        return view('course.index',['courses'=>Course::where('user_id','=',auth()->user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course=$request->validate([
            'name'=>'required|string',
            'duration'=>'required|numeric',
            'description'=>'required|string'
        ]);

        $course['user_id']=auth()->user()->id;
        Course::create($course);
        return redirect('/courses');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show',['course'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.edit',['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $updates=$request->validate([
            'name'=>'required|string',
            'duration'=>'required|numeric',
            'description'=>'required|string'
        ]);
        $course->update($updates);
         return redirect('/courses');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
            $course->delete();
            return redirect('/courses');
    }
}
