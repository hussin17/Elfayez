<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonFile;
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

    public function lessons($courseID, $lessonID = 0)
    {
        // Course Information
        $course = Course::find($courseID);

        $lessons = Lesson::where('course_id', $courseID)->get();

        if ($lessonID > 0) {
            $main_lesson = Lesson::where('course_id', $courseID)->where('id', $lessonID)->first();
            $nextLesson = Lesson::where('course_id', $courseID)->where('id', '>', $lessonID)->first();
            $previousLesson = Lesson::where('course_id', $courseID)->where('id', '<', $lessonID)->first();
            $lessonFiles = LessonFile::where('lesson_id', $main_lesson->id)->get();
            $lessonImages = LessonImage::where('lesson_id', $main_lesson->id)->get();
        }

        if ($lessonID == 0) {
            $main_lesson = Lesson::where('course_id', $courseID)->first();
            $nextLesson = Lesson::where('course_id', $courseID)->where('id', '>', $main_lesson->id)->first();
            $previousLesson = Lesson::where('course_id', $courseID)->where('id', '<', $main_lesson->id)->first();
            $lessonFiles = LessonFile::where('lesson_id', $main_lesson->id)->get();
            $lessonImages = LessonImage::where('lesson_id', $main_lesson->id)->get();
        }

        return view('lessons', compact('lessons', 'nextLesson', 'previousLesson', 'course', 'lessonFiles', 'lessonImages', 'main_lesson'));
    }
}
