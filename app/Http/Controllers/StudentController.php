<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $data = Student::all();
        $kelas = Grade::all();
        return view('students.index', compact('data', 'kelas'));
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
        // khusus untuk add file
        if($request->hasFile('foto'))
        {
            $gambar = $request->file('foto');
            $extension = $gambar->getClientOriginalExtension();
            $path_destination = 'public/images/foto-siswa';
            $name = 'Foto-Siswa'.Carbon::now()->format('Ymd_his').'.'.$extension;
            $path = $request->file('foto')->storeAs($path_destination, $name);
            $input['foto'] = $name;
        }
        Student::create($input);
        return back()->with('success', 'Data siswa berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Student::find($id);
        $kelas = Grade::all();
        return view('students.detail', compact('data', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Student::find($id);
        $input = $request->all();
        if($request->hasFile('foto'))
        {
            $gambar = $request->file('foto');
            $extension = $gambar->getClientOriginalExtension();
            $path_destination = 'public/images/foto-siswa';
            $name = 'Foto-Siswa'.Carbon::now()->format('Ymd_his').'.'.$extension;
            $path = $request->file('foto')->storeAs($path_destination, $name);
            $input['foto'] = $name;
            Storage::delete('public/public/images/foto-siswa'.$data->foto);
        }
        $data->update($input);
        return back()->with('success', 'Data berhasil diubah');

        // dd($input);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Student::find($id);
        $data->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
