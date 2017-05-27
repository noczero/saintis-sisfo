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
		@for ($i = 0 ; $i< count($subject); $i++)
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List File - {{ $subject[$i] }}	 
                            </h2>
                        </div>
                        <div class="body">


                        	@for ($j=0; $j < count($listFile); $j++)
								
								<?php 
										$pieces = explode('/',$listFile[$j]);
										if ($pieces[2] == $subject[$i]) {
												$links = strstr($listFile[$j], '/');
												echo ' <li>';
												echo '<a href="storage' . $links . '" download>'  .$pieces[3] . '</a>';
												echo '</li>';

										
									}
								?>

								
							@endfor
                        </div>
                    </div>
                </div>
		@endfor
	</div>
	
	</div>
@stop