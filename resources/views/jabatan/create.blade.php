@extends('template_admin.master')
@section('title', "Master Jabatan")
@section('jabatan', 'active')
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Jabatan</h3>
            <p class="text-subtitle text-muted">Tambah Data Jabatan.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Jabatan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Input Jabatan</h4>
        </div>
        <div class="card-body">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="{{ route('jabatan.store') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="nama">Nama Jabatan</label>
                                                    <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror"
                                                        placeholder="Silahkan Isi Nama Jabatan.." name="nama" value="{{ old('nama') }}" required>
                                                    @if($errors->has('nama'))
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{$errors->first('nama') }}</strong>
                                                      </span>
                                                    @endif
                                                </div>
																								<div class="form-group">
																									<label for="keterangan">Keterangan Jabatan</label>
																									<textarea name="keterangan" id="keterangan" class="form-control" required>{{ old('keterangan') }}</textarea>
																									@if($errors->has('keterangan'))
																										<span class="invalid-feedback" role="alert">
																											<strong>{{$errors->first('keterangan') }}</strong>
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