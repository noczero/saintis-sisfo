@extends('layouts.template')

@section('content')

			<div class="block-header">
                <h2>MANAGE KELAS</h2>
            </div>


<div class="panel panel-info">
	<div class="panel-body">
		<a href="{{ URL('kelas/create') }}" class="btn btn-raised btn-primary pull-right">Tambah</a>
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
		<table class="table table-bordered table-hover ">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Kelas</th>
					<th>Tahun Ajar</th>
				</tr>
			</thead>
			<tbody>
				@php(
					$no = 1 {{-- buat nomor urut --}}
					)
				{{-- loop all kelas --}}
				@foreach ($kelass as $kelas)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $kelas->nama_kelas }}</td>
						<td>{{ $kelas->tahun_ajaran }}</td>
						<td>
							<center>
								<a href="{{ URL('kelas/show') }}/{{ $kelas->id }}" class="btn btn-sm btn-raised btn-info">Edit</a>
								<a href="{{ URL('kelas/destroy') }}/{{ $kelas->id }}" class="btn btn-sm btn-raised btn-danger">Hapus</a>
							</center>
						</td>
					</tr>
				@endforeach
				{{-- // end loop --}}
			</tbody>
		</table>
	</div>
</div>

@stop