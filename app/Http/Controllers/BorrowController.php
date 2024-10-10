<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::all();
        return view('borrow.index', compact('data'));
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
        Borrow::create($input);
        return back()->with('success', 'Siswa berhasil meminjam laptop');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Student::find($id);
        $pinjam = Borrow::where('id_student', $id)->get()->all();
        return view('borrow.detail', compact('data', 'pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Borrow::find($id);
        $input['status'] = 'dikembalikan';
        $data->update($input);
        return back()->with('success', 'laptop sudah dikembalikan');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
