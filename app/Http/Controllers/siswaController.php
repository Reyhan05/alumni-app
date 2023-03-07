<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\jenis_kelamin;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fungsi query builder
        $students = Students::get();

        $genders = jenis_kelamin::get();
        // fungsi orm eloquent
        //$students2 = Students::all();
        // fungsi query builder
        //$students3 = DB::select('select * from students');
        return view('siswa', compact('students','genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // metode eloquent
        $students = new Students;
        $students->id_gender = $request->id_gender;
        $students->nama = $request->nama;
        $students->tgl_lahir = $request->tgl_lahir;
        $students->nik = $request->nik;
        $students->jurusan = $request->jurusan;
        $students->angkatan = $request->angkatan;
        $students->alamat = $request->alamat;
        $students->save();

        if ($students){
            return redirect()->route('siswa')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('siswa')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
