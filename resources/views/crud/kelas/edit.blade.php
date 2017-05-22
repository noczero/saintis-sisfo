
@extends('layouts.template') 

@section('content')

					<div class="card">
                        <div class="header">
                            <h2>
                                Edit Kelas
                            </h2>
                            <a href="{{ URL('kelas') }}" class="btn btn-raised btn-danger pull-right">Kembali</a>
                            <br>
                            {{-- part alert --}}
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
                            <form action="{{ URL('kelas/update/'. $showById->id) }}" method="POST">
                            	{{ csrf_field() }}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  class="form-control" type="text" name="nama_kelas" value="{{ $showById->nama_kelas }}">
                                        <label class="form-label">Nama Kelas</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  class="form-control" type="text" name="tahun_ajaran" 
                                        value="{{ $showById->tahun_ajaran }}">
                                        <label class="form-label">Tahun Ajaran ex: 2016/2017</label>
                                    </div>
                                </div>
								
								<button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button>
						        <button type="reset" class="btn btn-warning m-t-15 waves-effect">Reset</button>

                           
                            </form>
                        </div>
					</div>

@stop
