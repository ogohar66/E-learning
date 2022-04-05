<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function enroll(Course $course)
    {
        Enrollment::create([
            'course_id'=>$course->id,
            'user_id'=>auth()->user()->id,
        ]);
        return redirect('/courses');
    }
    public function unEnroll($id)
    {
        $enrollment=Enrollment::where([
           ['course_id','=',$id],
           ['user_id','=',auth()->user()->id]
        ])->get()->first();
        if($enrollment)
        {
            $enrollment->delete();
            return redirect('/courses');
        }
        abort(403);
    }
}
