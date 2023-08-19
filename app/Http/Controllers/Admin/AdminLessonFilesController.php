<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonFile;
use Illuminate\Http\Request;

class AdminLessonFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lesson_id)
    {
        $file = LessonFile::where('lesson_id', $lesson_id)->first();
        return view('admin.lessons.files.create', compact('file', 'lesson_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'lesson_id' => 'required',
        ]);

        $fileName = time() . '.' . $request->file('file')->extension();
        $request->file('file')->move(public_path('admin/upload/lessons/files'), $fileName);

        $file = new LessonFile;
        $file->src = $fileName;
        $file->name = $request->name;
        $file->description = $request->description;
        $file->lesson_id = $request->lesson_id;
        $file->save();
        return redirect()->back()->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // GetFiles
        // Get Lesson Information
        $lessonInfo = Lesson::find($id);
        $lessonFiles = LessonFile::where('lesson_id', $id)->get();
        return view('admin.lessons.files.index', compact('lessonInfo', 'lessonFiles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lessonFile = LessonFile::find($id);
        return view('admin.lessons.files.edit', compact('lessonFile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $file = LessonFile::find($id);
        $file->name = $request->name;
        $file->description = $request->description;
        $file->save();
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LessonFile::find($id)->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    public function download($name)
    {
        $path = public_path('/admin/uploads/lessons/files/' . $name);
        $header = ['Content-Type' => 'application/pdf'];
        return response()->download($path, $name, $header);
    }
}
