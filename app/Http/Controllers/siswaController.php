<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\jenis_kelamin;
use App\Http\Request\siswaValidate;
use File;
use PDF;

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
        $students = Students::orderBy('id','desc')->paginate(10);

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
        // form validation
        // $this->validate($request,
            // [
            //     'id_jenkel' => 'required|integer',
            //     'nama' => 'required|max:255',
            //     'tgl_lahir' => 'required|date',
            //     'nik' => 'required|max:15',
            //     'jurusan' => 'required|max:3',
            //     'angkatan' => 'required|max:3',
            //     'alamat' => 'required|string|max:255'
            // ],
        
        //     // validasi custom
        //     // [
        //     //     'id_jenkel.required' => 'Wajib di isi!',
        //     //     'name.required' => 'Wajib di isi!',
        //     //     'tgl_lahir.required' => 'Wajib di isi!',
        //     //     'nik.required' => 'Wajib di isi!',
        //     //     'jurusan.required' => 'Wajib di isi!',
        //     //     'angkatan.required' => 'Wajib di isi!',
        //     //     'alamat.required' => 'Wajib di isi!'
        //     // ],
        


        // metode eloquent
        $students = new Students;
        $students->id_gender = $request->id_gender;
        $students->nama = $request->nama;
        $students->tgl_lahir = $request->tgl_lahir;
        $students->nik = $request->nik;
        $students->jurusan = $request->jurusan;
        $students->angkatan = $request->angkatan;
        $students->alamat = $request->alamat;

        // untuk mendefinisikan letak folder foto
        $path = 'uploads/';
        // Jikalau menambahkan foto
        if (File::isDirectory($path)){
            // masukan kondisi ketika file berada dalam directory uploads
            // mendefinisikan variable untuk menampung request atau permintaan file foto
            $file = $request->file('photo');

            // mendefinisikan nama format nama file foto
            $filename = $file->getClientOriginalName();

            // memindahkan file foto ke dalam folder uploads beserta format nama
            $file->move($path, $filename);

            // menyimpan nama file foto ke dalam database
            $students->photo = $filename;      
        }
        $students->save();

        if ($students){
            return redirect('/siswa')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect('/siswa')->with(['error' => 'Data Gagal Disimpan']);
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
        // metode eloquent
        $students = Students::find($id);
        $students->id_gender = $request->id_gender;
        $students->nama = $request->nama;
        $students->tgl_lahir = $request->tgl_lahir;
        $students->nik = $request->nik;
        $students->jurusan = $request->jurusan;
        $students->angkatan = $request->angkatan;
        $students->alamat = $request->alamat;
        $path = 'uploads/'.$students->photo;

        // Jikalau menambahkan foto
        if ($request->hasFile('photo-edit')){
            if (File::exists($path)){
                File::delete($path);
            }
                // mendefinisikan variable untuk menampung request atau permintaan file foto
                $file = $request->file('photo-edit');
    
                // mendefinisikan nama format nama file foto
                $filename = $file->getClientOriginalName();
    
                // memindahkan file foto ke dalam folder uploads beserta format nama
                $file->move('uploads/', $filename);
    
                // menyimpan nama file foto ke dalam database
                $students->photo = $filename;      
        }
        $students->save();


        if ($students){
            return redirect('/siswa')->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect('/siswa')->with(['error' => 'Data Gagal Diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mencari object berdasarkan parameter id
        $siswa = Students::find($id);

        // mendefinisikan letak folder foto
        $path = 'uploads/'.$siswa->photo;

        // menambahkan kondisi ketika ada file maka system akan menghapus file foto
        if(File::exists($path)){
            // logic hapus file di jalankan
            File::delete($path);
        }

        $siswa->delete();

        if ($siswa){
            return redirect('/siswa')->with(['success' => 'Berhasil Delete data']);
        } else {
            return redirect('/siswa')->with(['error' => 'Ada masalah Coi!']);
        }
    }

    public function exportPDF(){
        $siswa = Students::orderBy('id', 'desc')->get();

        $export = PDF::loadView('siswapdf',['students' => $siswa]);
        return $export->download('pdf_siswa.pdf');
    }
}
