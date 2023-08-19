<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\LessonFile;
use App\Models\LessonImage;
use App\Models\LessonVideo;
use App\Models\Level;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class AdminLessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Lesson::all();
        $grades = Grade::all();
        $courses = Course::all();
        $levels = Level::all();
        $lessons = Lesson::with(['major', 'grade', 'course', 'level', 'video'])->get();
        // dd(Lesson::with('video')->get());
        return view('admin.lessons.index', compact('lessons', 'grades', 'courses', 'levels', 'majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::all();
        $grades = Grade::all();
        $courses = Course::all();
        $levels = Level::all();
        $lessons = Lesson::all();
        return view('admin.lessons.create', compact('lessons', 'grades', 'courses', 'levels', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validation data
        $this->validate($request, [
            'main_image' => 'required',
            'name' => 'required',
            'major_id' => 'required',
            'grade_id' => 'required',
            'course_id' => 'required',
            'level_id' => 'required',
            'description' => 'required',
        ]);

        // Upload image to storage
        $imageName = time() . '.' . $request->file('main_image')->extension();
        $request->file('main_image')->move(public_path('admin/upload/lessons/images'), $imageName);

        DB::beginTransaction();
        try {
            // Upload Data to database
            $lesson = new Lesson;
            $lesson->main_image = $imageName;
            $lesson->name = $request->name;
            $lesson->grade_id = $request->grade_id;
            $lesson->major_id = $request->major_id;
            $lesson->level_id = $request->level_id;
            $lesson->course_id = $request->course_id;
            $lesson->description = $request->description;
            $lesson->instructor_id = auth()->user()->id;
            $lesson->save();
            // Get Last Insert ID
            $lessonID = $lesson->id;

            if ($request->file('video')) {
                $this->validate($request, [
                    'video' => 'max:500000',
                ], [
                    'video' => 'حجم الفيديو كبير'
                ]);
                // Upload image to storage
                $video = new LessonVideo;
                $videoName = time() . '.' . $request->file('video')->extension();
                $request->file('video')->move(public_path('admin/upload/lessons/videos'), $videoName);
                $video->name = $videoName;
                $video->type = '2';
                $video->lesson_id = $lessonID;
                $video->save();
            } else if ($request->youtube) {
                $video = new LessonVideo;
                $video->name = $request->youtube;
                $video->type = '1';
                $video->lesson_id = $lessonID;
                $video->save();
            } else {
                return redirect()->back()->with('Error', "يرجى الحاق الفيديو");
                // exit();
            }

            DB::commit();
        } catch (PDOException $e) {
            DB::rollBack();
            // dd($e->getMessage());
            return redirect()->back()->with('Error', 'حدث خطأ في اضافة البيانات');
        }

        if ($request->file('files')) {
            foreach ($request->file('files') as $key => $fileItem) {
                // Upload file to storage
                $file = new LessonFile;
                $fileName = $key . time() . '.' . $fileItem->extension();
                $fileItem->move(public_path('admin/upload/lessons/files'), $fileName);
                $file->src = $fileName;
                $file->name = $request->fileName;
                $file->description = $request->fileDescription;
                $file->lesson_id = $lessonID;
                $file->save();
            }
        }

        if ($request->file('images')) {
            foreach ($request->file('images') as $key => $imageItem) {
                // Upload image to storage
                $image = new LessonImage;
                $imageName = $key . time() . '.' . $imageItem->extension();
                $imageItem->move(public_path('admin/upload/lessons/images'), $imageName);
                $image->name = $imageName;
                $image->lesson_id = $lessonID;
                $image->save();
            }
        }

        return back()->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $majors = Major::all();
        $grades = Grade::all();
        $courses = Course::all();
        $levels = Level::all();
        $lesson = Lesson::find($id);
        return view('admin.lessons.edit', compact('lesson', 'grades', 'courses', 'levels', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        // Validation data
        $this->validate($request, [
            'main_image' => 'required',
            'name' => 'required',
            'major_id' => 'required',
            'grade_id' => 'required',
            'course_id' => 'required',
            'level_id' => 'required',
            'description' => 'required',
        ]);

        // Upload image to storage
        $imageName = time() . '.' . $request->file('main_image')->extension();
        $request->file('main_image')->move(public_path('admin/upload/lessons/images'), $imageName);

        DB::beginTransaction();
        try {
            // Upload Data to database
            $lesson = Lesson::find($id);
            $lesson->main_image = $imageName;
            $lesson->name = $request->name;
            $lesson->grade_id = $request->grade_id;
            $lesson->major_id = $request->major_id;
            $lesson->level_id = $request->level_id;
            $lesson->course_id = $request->course_id;
            $lesson->description = $request->description;
            $lesson->instructor_id = auth()->user()->id;
            $lesson->save();
            // Get Last Insert ID
            $lessonID = $lesson->id;

            if ($request->file('video')) {
                $this->validate($request, [
                    'video' => 'max:300000',
                ], [
                    'video' => 'حجم الفيديو كبير'
                ]);
                // Upload image to storage
                $video = LessonVideo::find($id);
                $videoName = time() . '.' . $request->file('video')->extension();
                $request->file('video')->move(public_path('admin/upload/lessons/videos'), $videoName);
                $video->name = $videoName;
                $video->type = 2;
                $video->lesson_id = $lessonID;
                $video->save();
            } else if ($request->youtube) {
                $video = new LessonVideo;
                $youtubeLink = explode('/', $request->youtube);
                $video->name = $request->youtube;
                $video->type = 1;
                $video->lesson_id = $lessonID;
                $video->save();
            } else {
                return redirect()->back()->with('Error', "يرجى الحاق الفيديو");
                // exit();
            }

            DB::commit();
        } catch (PDOException $e) {
            DB::rollBack();
            return redirect()->back()->with('Error', 'حدث خطأ في اضافة البيانات');
        }

        dd($youtubeLink, $youtubeLink[-1]);

        if ($request->file('files')) {
            foreach ($request->file('files') as $key => $fileItem) {
                // Upload file to storage
                $file = new LessonFile;
                $fileName = $key . time() . '.' . $fileItem->extension();
                $fileItem->move(public_path('admin/upload/lessons/files'), $fileName);
                $file->src = $fileName;
                $file->name = $request->fileName;
                $file->description = $request->fileDescription;
                $file->lesson_id = $lessonID;
                $file->save();

            }
        }
        if ($request->file('images')) {
            foreach ($request->file('images') as $key => $imageItem) {
                // Upload image to storage
                $image = new LessonImage;
                $imageName = $key . time() . '.' . $imageItem->extension();
                $imageItem->move(public_path('admin/upload/lessons/images'), $imageName);
                $image->name = $imageName;
                $image->lesson_id = $lessonID;
                $image->save();
            }
        }

        return back()->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lesson::find($id)->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
