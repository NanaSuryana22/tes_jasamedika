@extends('template_admin.master')
@section('title', "Master Tugas Jabatan")
@section('tugas_jabatan', 'active')
@section('content')
<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Jabatan</h3>
          <p class="text-subtitle text-muted">Koleksi Data Tugas Jabatan.</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><a href="{{ route('tugas_jabatan.index') }}">Tugas Jabatan</a></li>
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
      <h4 class="card-title">Tabel Data Tugas Jabatan</h4>
      <a href="{{ route('tugas_jabatan.create') }}" class="btn btn-sm btn-info">Tambah Tugas Jabatan</a>
    </div>
    <div class="card-body">
      <div>
				<section id="no-more-tables">
					<table class="table table-bordered table-striped table-condensed cf">
						<thead class="cf">
							<tr>
								<th class="th-font">Nomor</th>
								<th class="th-font">Nama Tugas</th>
								<th class="th-font">Bobot Penilaian </th>
								<th class="th-font">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($datas as $no => $data)
								<tr>
									<td class="th-font" data-title="Nomor">{{ ++$no + ($datas->currentPage()-1) * $datas->perPage() }}</td>
									<td class="th-font" data-title="Nama Tugas">{{ $data->nama_tugas }}</td>
									<td class="th-font" data-title="Bobot Penilaian">{{ $data->bobot_penilaian }}</td>
									<td class="th-font" data-title="Aksi">
										<form action="{{ route('tugas_jabatan.destroy', $data->id) }}" method="post">
											{{--  <a class="btn btn-sm btn-primary"
												href="{{ route('jabatan.show',$data->id) }}" title="Lihat Detail">
												<i class="fa fa-eye"></i>
											</a>  --}}
											<a class="btn btn-sm btn-warning"
												href="{{ route('tugas_jabatan.edit',$data->id) }}" title="Ubah Data">
												<i class="fa fa-pencil"></i>
											</a>
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-sm btn-danger" type="submit"
												onclick="return confirm('Yakin ingin menghapus jabatan ini ?')">
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