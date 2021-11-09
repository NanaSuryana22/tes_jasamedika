<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Session;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pegawai::orderBy('created_at', 'desc')->paginate(10);
        return view('pegawai.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::orderBy('nama', 'asc')->get();
        return view('pegawai.create')->with('jabatan', $jabatan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pegawai();
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jabatan_id = $request->jabatan_id;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->save();

        Session::flash("notice", "Pegawai $data->nama Berhasil Dibuat.");
        return redirect()->route("pegawai.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $jabatan = Jabatan::orderBy('nama', 'asc')->get();
        return view('pegawai.edit', compact('pegawai'))->with('jabatan', $jabatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pegawai::find($id);
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jabatan_id = $request->jabatan_id;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->save();

        Session::flash("notice", "Pegawai $data->nama Berhasil Diubah.");
        return redirect()->route("pegawai.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::find($id);
        $data->delete();

        Session::flash("notice", "Pegawai terpilih berhasil dihapus");
        return redirect()->route("pegawai.index");
    }
}
