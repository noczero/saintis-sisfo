@extends('layouts.template')

@section('content')

<div class="card">
    <div class="header">
    	<h2> Manage Guru </h2>
    	<a href="{{ URL('manage-siswa/create') }}" class="btn btn-primary pull-right">Tambah</a>
    	<br>
    	{{-- part alert --}}
		
			{{-- Kita cek, jika sessionnya ada maka tampilkan alertnya, jika tidak ada maka tidak ditampilkan alertnya --}}
		
		@if (Session::has('after_update'))
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-{{ Session::get('after_update.alert') }}">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>{{ Session::get('after_update.title') }}</strong>
					  <a href="javascript:void(0)" class="alert-link">{{ Session::get('after_update.text-1') }}</a> {{ Session::get('after_update.text-2') }}
					</div>
				</div>
			</div>
		@endif
		{{-- end part alert --}}
    </div>
    <div class="body">
    	<table class="table table-bordered table-hover ">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Siswa</th>
					<th>Tanggal Lahir</th>
					<th>Umur</th>
					<th>Asal Sekolah</th>
					<th>Paket Bimbel</th>
					<th>Mapel Ajar</th>
					<th>Status</th>
					<th>No. Telp</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@php(
					$no = 1 {{-- buat nomor urut --}}
					)
				{{-- loop all siswa --}}
				@foreach ($siswas as $siswa)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $siswa->name }}</td>
						<td>{{ $siswa->TTL }}</td>
						<td>{{ $siswa->age }}</td>
						<td>{{ $siswa->gaji }}</td>
						<td>
						@foreach ($siswa->kelas as $guru_kelas)
							{{ $guru_kelas->nama_kelas }} <br>
						@endforeach
						</td>
						<td>
						@foreach ($siswa->kelas as $guru_kelas)
							{{ $guru_kelas->pivot->mapel }} <br>
						@endforeach
						</td>
						<td>{{ $siswa->status }}</td>
						<td>{{ $siswa->no_tel }}</td>
						<td width="5%">
							<p data-placement="top" data-toggle="tooltip" title="Edit">
								<a href="{{ URL('manage-siswa/show') }}/{{ $siswa->id }}" class="btn btn-info btn-xs">
										<span class="glyphicon glyphicon-pencil"></span>
								</a>
							</p>
						</td>
						<td width="5%">
							<form class="form-group" action="{{ 'manage-siswa/destroy/'.$siswa->id }}" method="POST">
								{{csrf_field()}}
								{{ method_field('DELETE')}}
								<button class="btn btn-danger btn-xs" type="submit" ><span class="glyphicon glyphicon-trash"></span></button>
							</form>
						</td>
    					
					</tr>
				@endforeach
				{{-- // end loop --}}
			</tbody>
		</table>
    </div>


@stop