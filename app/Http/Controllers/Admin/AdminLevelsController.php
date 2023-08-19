<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;

class AdminLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::with('course')->get();
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        $courses = Course::all();
        return view('admin.levels.create', compact('levels', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation data
        $this->validate($request, [
            'name' => 'required',
            'course_id' => 'required',
        ]);

        // Upload Data to database
        $levels = new Level;

        $levels->name = $request->name;
        $levels->course_id = $request->course_id;

        $levels->save();

        return back()->with('success', 'تم اضافة مستوى بنجاح');
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
        $level = Level::find($id);
        $courses = Course::all();
        return view('admin.levels.edit', compact('level', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation data
        $this->validate($request, [
            'name' => 'required',
            'course_id' => 'required',
        ]);

        // Upload Data to database
        $levels = Level::find($id);

        $levels->name = $request->name;
        $levels->course_id = $request->course_id;

        $levels->save();

        return back()->with('success', 'تم تعديل المستوى بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Level::find($id)->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
