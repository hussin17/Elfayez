<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class AdminRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rates = Rate::all();
        return view('admin.rates.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rate' => ['required', 'integer', 'unique:rates'],
        ]);

        $rate = new Rate;
        $rate->rate = $request->rate;
        $rate->save();
        return redirect()->back()->with('success', "تم الاضافة بنجاح");
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
        $rate = Rate::find($id);
        return view('admin.rates.edit', compact('rate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'rate' => ['required', 'integer', 'unique:rates,rate'],
        ]);

        $rate = Rate::find($id);
        $rate->rate = $request->rate;
        $rate->save();
        return redirect()->back()->with('success', "تم التعديل بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rate::find($id)->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
