@extends('layouts.template')

@section('content')

<div class="card">
    <div class="header">
    	<h2> Manage Kelas </h2>
    	<a href="{{ URL('kelas/create') }}" class="btn btn-primary pull-right">Tambah</a>
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
    	<table class="table table-hover ">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Kelas</th>
					<th>Tahun Ajar</th>
					<th>Edit</th>
					<th>Delete</th>

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
						<td width="5%">
							<p data-placement="top" data-toggle="tooltip" title="Edit">
								<a href="{{ URL('kelas/show') }}/{{ $kelas->id }}" class="btn btn-info btn-xs">
										<span class="glyphicon glyphicon-pencil"></span>
								</a>
							</p>
						</td>
						<td width="5%">
							<form class="form-group" action="{{ 'kelas/destroy/'.$kelas->id }}" method="POST">
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