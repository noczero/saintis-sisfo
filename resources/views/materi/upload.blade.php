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
	<div class="card">
        <div class="header">
            <h2>
				Upload File {{$id}}
            </h2>
        </div>
        <div class="body">
           <div class="form-group">
			<form action="{{ route('upload.submit') }}" enctype="multipart/form-data" method="POST" >
			{{csrf_field()}}
			  <input type="hidden" name="id" value="{{$id}}">
			    <label for="exampleInputFile">File input</label>
			    	<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="materi">
			    <small id="fileHelp" class="form-text text-muted">Pilih dokumen dengan ekstensi pdf,docx, atau pptx</small>

			    <input type="submit" value="Upload">
			</form>
		  </div>

        </div>
    </div>

@stop