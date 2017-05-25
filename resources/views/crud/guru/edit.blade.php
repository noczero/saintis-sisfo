
@extends('layouts.template') 

@section('content')

					<div class="card">
                        <div class="header">
                            <h2>
                                Edit Guru
                            </h2>
                            <a href="{{ URL('manage-guru') }}" class="btn btn-raised btn-danger pull-right">Kembali</a>
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
                            <form action="{{ URL('manage-guru/update/'. $showById->id) }}" method="POST">
                            	{{ csrf_field() }}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  class="form-control" type="text" name="name" value="{{ $showById->name }}">
                                        <label class="form-label">Nama Guru</label>
                                    </div>
                                    <div class="help-info">Required</div>
                                </div>

                               <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  class="form-control" type="text" name="TTL" value="{{ $showById->TTL }}">
                                        <label class="form-label">Tempat Tanggal Lahir</label>
                                    </div>
                                    <div class="help-info">YYYY-MM-DD. ex : 1997-06-21</div>
                                </div>

                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  class="form-control" type="text" name="gaji" value="{{ $showById->gaji }}">
                                        <label class="form-label">Gaji</label>
                                    </div>
                                    <div class="help-info">Ex: 1000000</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  class="form-control" type="text" name="status" value="{{ $showById->status }}">
                                        <label class="form-label">Status</label>
                                    </div>
                                    <div class="help-info">Ex: Menikah/Mahasiswa/Pelajar</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  class="form-control" type="text" name="no_tel" value="{{ $showById->no_tel }}">
                                        <label class="form-label">No. Telp</label>
                                    </div>
                                    <div class="help-info">Ex: 08821239233</div>

                                </div>
								
								<button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button>
						        <button type="reset" class="btn btn-warning m-t-15 waves-effect">Reset</button>

                           
                            </form>
                        </div>
					</div>

                   

@stop
