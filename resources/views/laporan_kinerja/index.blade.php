@extends('template_admin.master')
@section('title', "Master Laporan Kinerja")
@section('laporan_kinerja', 'active')
@section('content')
<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Laporan Kinerja</h3>
          <p class="text-subtitle text-muted">Koleksi Data Laporan Kinerja.</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><a href="{{ route('laporan_kinerja.index') }}">Laporan Kinerja</a></li>
              </ol>
          </nav>
      </div>
  </div>
</div>
<section class="section">
  <div class="card">
    <div class="card-header">
      <div class="col-lg-12">
        @include('template_admin.notice')
      </div>
      <h4 class="card-title">Tabel Data Laporan Kinerja</h4>
      <a href="{{ route('laporan_kinerja.create') }}" class="btn btn-sm btn-info">Tambah Laporan Kinerja</a>
    </div>
    <div class="card-body">
      <div>
				<section id="no-more-tables">
					<table class="table table-bordered table-striped table-condensed cf">
						<thead class="cf">
							<tr>
								<th class="th-font">Nomor</th>
								<th class="th-font">Nama Pegawai</th>
								<th class="th-font">Jabatan </th>
								<th class="th-font">Tugas Jabatan </th>
								<th class="th-font">Bobot Penilaian </th>
								<th class="th-font">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($datas as $no => $data)
								<tr>
									<td class="th-font" data-title="Nomor">{{ ++$no + ($datas->currentPage()-1) * $datas->perPage() }}</td>
									<td class="th-font" data-title="Nama Pegawai">{{ $data->pegawais->nama }}</td>
									<td class="th-font" data-title="Jabatan">{{ $data->pegawais->jabatan->nama }}</td>
									<td class="th-font" data-title="Tugas Jabatan">{{ $data->tugas_jabatans->nama_tugas }}</td>
									<td class="th-font" data-title="Bobot Penilaian">{{ $data->tugas_jabatans->bobot_penilaian }}</td>
									<td class="th-font" data-title="Aksi">
										<form action="{{ route('laporan_kinerja.destroy', $data->id) }}" method="post">
											{{--  <a class="btn btn-sm btn-primary"
												href="{{ route('jabatan.show',$data->id) }}" title="Lihat Detail">
												<i class="fa fa-eye"></i>
											</a>  --}}
											<a class="btn btn-sm btn-warning"
												href="{{ route('laporan_kinerja.edit', $data->id) }}" title="Ubah Data">
												<i class="fa fa-pencil"></i>
											</a>
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-sm btn-danger" type="submit"
												onclick="return confirm('Yakin ingin menghapus Laporan Kinerja ini ?')">
												<i class="fa fa-trash" title="Hapus Data"></i>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $datas->links() }}
				</section>
			</div>			
    </div>
  </div>
</section>
@endsection
