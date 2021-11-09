@extends('template_admin.master')
@section('title', "Master Laporan Kinerja")
@section('laporan_kinerja', 'active')
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Laporan Kinerja</h3>
            <p class="text-subtitle text-muted">Edit Data Laporan Kinerja.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('laporan_kinerja.index') }}">Laporan Kinerja</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Laporan Kinerja</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Edit Laporan Kinerja</h4>
        </div>
        <div class="card-body">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                  <form class="form" action="{{ route('laporan_kinerja.update', $kinerja) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }} {{method_field('PUT')}}
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                          <div class="form-group">
                                            <label for="pegawai_id">Pilih Pegawai</label>
                                            <select name="pegawai_id" id="pegawai_id" class="form-control @error('pegawai_id') is-invalid @enderror">
                                                @foreach($pegawai as $k)
                                                  <option value="{{ $k->id}}" {{ ( $k->id == "$kinerja->pegawai_id") ? 'selected' : '' }}>{{ $k->nama }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('pegawai_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('pegawai_id') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                          <div class="form-group">
                                            <label for="tugas_jabatan_id">Pilih Tugas Jabatan</label>
                                            <select name="tugas_jabatan_id" id="tugas_jabatan_id" class="form-control @error('tugas_jabatan_id') is-invalid @enderror">
                                                @foreach($tugas_jabatan as $m)
                                                  <option value="{{ $m->id}}">{{ $m->nama_tugas }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('tugas_jabatan_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('tugas_jabatan_id') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 pull-left">Simpan</button>
                                            <button type="reset" class="btn btn-warning me-1 mb-1 pull-left">Reset</button>
                                            <a class="btn btn-info me-1 mb-1 pull-right" href="{{ url()->previous() }}">Kembali</a>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection