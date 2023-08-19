<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Level;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with(['major', 'instructor'])->get();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        $majors = Major::all();
        return view('admin.courses.create', compact('levels', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation data
        $this->validate($request, [
            'main_image' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'major_id' => 'required',
            'description' => 'required',
        ]);

        // Upload image to storage
        $imageName = time() . '.' . $request->file('main_image')->extension();

        $request->file('main_image')->move(public_path('admin/upload/courses/images'), $imageName);

        // Upload Data to database
        $course = new Course;

        $course->main_image = $imageName;
        $course->name = $request->name;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->major_id = $request->major_id;
        $course->instructor_id = auth()->user()->id;

        $course->save();

        return back()->with('success', 'تم اضافة كورس بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Select Record Using ID And Compact Record with Show Template
        // $course = Course::find($id);
        // return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        $majors = Major::all();
        return view('admin.courses.edit', compact('course', 'majors'));
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
            'price' => 'required',
            'status' => 'required',
            'major_id' => 'required',
            'description' => 'required',
        ]);

        // Upload image to storage
        $imageName = time() . '.' . $request->file('main_image')->extension();

        $request->file('main_image')->move(public_path('admin/upload/courses/images'), $imageName);

        // Upload Data to database
        $course = Course::find($id);

        $course->main_image = $imageName;
        $course->name = $request->name;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->major_id = $request->major_id;
        $course->instructor_id = auth()->user()->id;

        $course->save();

        return back()->with('success', 'تم تعديل كورس بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::find($id)->delete();
        return redirect()->back()->with('success', 'تم حذف الكورس بنجاح');
    }
}
