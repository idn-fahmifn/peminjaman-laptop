<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Grade::all();
        return view('grades.index', compact('data'));
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
        $input = $request->all();

        $request->validate([
            'nama' => 'min:3|string|required',
            'jurusan' => 'min:3|string|required',
            'wali_kelas' => 'min:3|string|required',
        ]);

        Grade::create($input);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Grade::find($id);
        return view('grades.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Grade::find($id);
        $request->validate([
            'nama' => 'min:3|string|required',
            'jurusan' => 'min:3|string|required',
            'wali_kelas' => 'min:3|string|required',
        ]);

        $data->update($input);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Grade::find($id);
        $data->delete();
        return back();
    }
}
