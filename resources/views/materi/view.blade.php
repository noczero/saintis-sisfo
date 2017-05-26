@extends('layouts.template')

@section('content')
	<div class="container-fluid">
	
	<div class="block-header"> 
		<div class="row clearfix">
			<div class="col-md-4">
				<h2> File Materi</h2> 
			</div>

			<div class="col-md-4">
				
			</div>
		</div>

	</div>	
	<div class="row clearfix">
		@foreach ($gurus->kelas as $kelas)
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List File - {{$kelas->pivot->mapel}}	 
                                <small><a href="{{ url('upload-materi/'.$kelas->pivot->mapel)}}" class="btn btn-xs">Tambah</a></small>
                            </h2>
                        </div>
                        <div class="body">
                        	@for ($i=0; $i < count($listFile); $i++)
								<p>{{$listFile[$i]}}</p>
								@php
									$check = substr( $listFile[$i], 7, strlen($kelas->pivot->mapel))
								@endphp

								@if ( $check == $kelas->pivot->mapel) 
									<p>True	</p>
								@elseif
								    <p> False</p>
								@endif
							@endfor
                        </div>
                    </div>
                </div>
		@endforeach
	</div>
	
	</div>
@stop