<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Langs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminLangsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $langs = Langs::all();
        return view('admin.langs.index', compact('langs'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);
        $lang = new Langs;
        $lang->name = $request->name;
        $lang->save();
        return redirect()->back()->with("success", "تمت الاضافة بنجاح");
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
        $lang = Langs::find($id);
        return view('admin.langs.edit', compact('lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $lang = Langs::find($id);
        $lang->name = $request->name;
        $lang->save();
        return redirect()->back()->with("success", "تم التعديل بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Langs::where('id', $id)->delete();
        return redirect()->back();
    }
}
