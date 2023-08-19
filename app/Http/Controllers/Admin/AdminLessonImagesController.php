<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonImage;
use Illuminate\Http\Request;

class AdminLessonImagesController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('images')) {
            foreach ($request->file('images') as $key => $imageItem) {
                // Upload image to storage
                $image = new LessonImage;
                $imageName = $key . time() . '.' . $imageItem->extension();
                $imageItem->move(public_path('admin/upload/lessons/images'), $imageName);
                $image->name = $imageName;
                $image->lesson_id = $request->lesson_id;
                $image->save();
            }
        }
        return redirect()->back()->with('success', 'تم اضافة الصور بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lessonInfo = Lesson::find($id);
        $lessonImages = LessonImage::where('lesson_id', $id)->get();
        return view('admin.lessons.images.index', compact('lessonInfo', 'lessonImages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lessonFile = LessonImage::find($id);
        return view('admin.lessons.images.edit', compact('lessonImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $image = LessonImage::find($id);
        $image->name = $request->name;
        $image->save();
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LessonImage::find($id)->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
