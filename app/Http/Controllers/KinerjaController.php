<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use App\Models\Pegawai;
use App\Models\TugasJabatan;
use Illuminate\Http\Request;
use Session;

class KinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Kinerja::orderBy('created_at', 'desc')->paginate(10);
        return view('laporan_kinerja.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugas_jabatan = TugasJabatan::orderBy('nama_tugas', 'asc')->get();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();

        return view('laporan_kinerja.create')->with('pegawai', $pegawai)->with('tugas_jabatan', $tugas_jabatan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Kinerja();
        $data->pegawai_id = $request->pegawai_id;
        $data->tugas_jabatan_id = $request->tugas_jabatan_id;
        $data->save();

        Session::flash("notice", "Laporan Kinerja Berhasil Dibuat.");
        return redirect()->route("laporan_kinerja.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kinerja  $kinerja
     * @return \Illuminate\Http\Response
     */
    public function show(Kinerja $kinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kinerja  $kinerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kinerja = Kinerja::find($id);
        $tugas_jabatan = TugasJabatan::orderBy('nama_tugas', 'asc')->get();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();

        return view('laporan_kinerja.edit')->with('pegawai', $pegawai)->with('kinerja', $kinerja)->with('tugas_jabatan', $tugas_jabatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kinerja  $kinerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kinerja::find($id);
        $data->pegawai_id = $request->pegawai_id;
        $data->tugas_jabatan_id = $request->tugas_jabatan_id;
        $data->save();

        Session::flash("notice", "Laporan Kinerja Berhasil Diubah.");
        return redirect()->route("laporan_kinerja.index");   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kinerja  $kinerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kinerja::find($id);
        $data->delete();

        Session::flash("notice", "Laporan Kinerja terpilih berhasil dihapus");
        return redirect()->route("laporan_kinerja.index");
    }
}
