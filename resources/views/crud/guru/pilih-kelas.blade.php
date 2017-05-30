
@extends('layouts.template') 

@section('content')

    <div class="card">
    	<div class="header">
         <h2> Ambil Kelas </h2>

        </div>
        
        <div class="body">
            
            <form action="{{ URL('pilih-kelas/store/'.$id)}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="hidden" value="{{ $id }}">
                        <select name="kelas_id">
                            <option value=""> -- Pilih Kelas yang mau diambil -- </option>
                            @foreach ($AllKelass as $AllKelas)
                                <option value="{{ $AllKelas->id }}">{{$AllKelas->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="help-info">Required</div>
                </div>
                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  class="form-control" type="text" name="mapel">
                                        <label class="form-label">Mata Pelajaran</label>
                                    </div>
                                    <div class="help-info">Required</div>
                                </div>

                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ambil</button>
                <button type="reset" class="btn btn-warning m-t-15 waves-effect">Reset</button>

           
            </form>

            <hr>
            <h4>Sudah Diambil</h4>
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas Ajar</th>
                                        <th>Mapel Ajar</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php(
                                        $no = 1 {{-- buat nomor urut --}}
                                        )
                                    {{-- loop all guru --}}
                                    @foreach ($gurus->kelas as $kelas)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $kelas->nama_kelas }}</td>
                                            <td>{{ $kelas->pivot->mapel }}</td>
                                            <td width="5%">
                                                <form class="form-group" action="{{ URL('pilih-kelas/destroy/'.$kelas->pivot->kelas_id)}}" method="POST">
                                                    {{ csrf_field() }}
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

    </div>
        

                   

@stop
