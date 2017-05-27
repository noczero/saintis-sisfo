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
                                <small><a href="{{ url('upload-materi/'.$kelas->pivot->mapel)}}" class="btn btn-xs pull-right">Tambah</a></small>
                            </h2>
                        </div>
                        <div class="body">
                        	@for ($i=0; $i < count($listFile); $i++)
								
								<?php 
										$pieces = explode('/',$listFile[$i]);
										if ($pieces[2] == $kelas->pivot->mapel) {
												$links = strstr($listFile[$i], '/');
												echo '<div class="row clear-fix">';
												echo '<div class="col-md-10 col-xs-10"> <li>';
												echo '<a href="storage' . $links . '" download>'  .$pieces[3] . '</a>';
												echo '</li></div>';

								?>
										<div class="col-md-2 col-xs-2">	
										<form class="form-group" action="{{ 'upload-materi/destroy/'.$pieces[2].'/'.$pieces[3] }}" method="POST">
											{{csrf_field()}}
											{{ method_field('DELETE')}}
											<button class="btn btn-danger btn-xs" type="submit" ><span class="glyphicon glyphicon-trash"></span></button>
										</form>
										</div>
								</div>
								<?php		
									}
								?>

								
							@endfor
                        </div>
                    </div>
                </div>
		@endforeach
	</div>
	
	</div>
@stop