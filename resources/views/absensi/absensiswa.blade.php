@extends('layouts.template')

@section('content')

<div class="card">
    <div class="header">
    	<h2> Absensi Siswa </h2>
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

    	<form action="{{ URL('absensi-kelas/store') }}" method="POST">
    	     {{ csrf_field() }}
    		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Siswa</th>
					<th>Hadir</th>
					<th>Sakit</th>
					<th>Izin</th>
					<th>Alpha</th>
				</tr>
			</thead>
			<tbody>
				@php(
					$no = 1 {{-- buat nomor urut --}}
					)
				{{-- loop all guru --}}
				@foreach ($siswas as $siswa)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $siswa->name }}</td>
						<td>    
 						     <input type="checkbox" name="absen-{{$siswa->id}}" value="H" id="absen{{$no}}" class="filled-in chk-col-pink">
                            <label for="absen{{$no}}">.</label>                                
                        </td>
						<td>
							<input type="checkbox" name="absen-{{$siswa->id}}" value="S" id="absenn{{$no}}" class="filled-in chk-col-pink">
                            <label for="absenn{{$no}}">.</label> 
						</td>
						<td> 
							<input type="checkbox" name="absen-{{$siswa->id}}" value="I" id="absennn{{$no}}" class="filled-in chk-col-pink">
                            <label for="absennn{{$no}}">.</label> 
                        </td>
						<td> 
							<input type="checkbox" name="absen-{{$siswa->id}}" value="A" id="absennnn{{$no}}" class="filled-in chk-col-pink">
                            <label for="absennnn{{$no}}">.</label> 
						</td>
					</tr>
				@endforeach
				{{-- // end loop --}}
			</tbody>
		</table>
			<button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
			<button type="reset" class="btn btn-warning m-t-15 waves-effect">Reset</button>     
        </form>
		

    </div>


@stop