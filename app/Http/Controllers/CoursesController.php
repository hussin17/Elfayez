<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonImage;
use App\Models\LessonVideo;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index($id)
    {
        $course = Course::find($id);
        return view('courses', compact('course'));
    }

    public function lessons($courseID, $lessonID)
    {
        $firstLesson = Lesson::first();
        $lessons = Lesson::with('course')->where('course_id', $courseID)->get();
        $lessonVideo = Lesson::with('video')->first();
        // dd($video);
        $lessonImages = LessonImage::where('lesson_id', $firstLesson->id)->get();
        $course = Course::find($courseID);
        return view('lessons', compact('lessons', 'firstLesson', 'course', 'lessonVideo', 'lessonImages'));
    }
}
