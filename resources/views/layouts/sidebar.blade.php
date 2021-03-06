            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    
                    <!-- SideBar Menu for Manager -->
                    @if (Auth::guard('manager')->check()) 
                    <li class="active">
                        <a href="{{ url('manager') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL('kelas') }}">
                            <i class="material-icons">text_fields</i>
                            <span>Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL('manage-guru') }}">
                            <i class="material-icons">layers</i>
                            <span>Guru</span>
                        </a>
                    </li>   
                    <li>
                        <a href="{{ URL('manage-siswa') }}">
                            <i class="material-icons">layers</i>
                            <span>Siswa</span>
                        </a>
                    </li>            
                    

                    <!-- SideBar Menu for Manager -->
                    @elseif (Auth::guard('guru')->check()) 
                    <li class="active">
                        <a href="{{ url('guru') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Absensi Kelas</span>
                        </a>
                        <ul class="ml-menu">
                            @foreach ($kelass as $kelas)
                            <li>
                                <a href="{{ url ('absensi-kelas/'.$kelas->id)}}">Kelas - {{ $kelas->nama_kelas }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('upload-materi') }}">
                            <i class="material-icons">library_books</i>
                            <span>Upload Materi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pilih-kelas/'.Auth::user()->id) }}">
                             <i class="material-icons">library_books</i>
                            <span>Pilih Kelas</span>
                        </a>
                    </li>
                          
                    <!-- SideBar Menu for Manager -->
                    @elseif (Auth::guard('siswa')->check()) 
                    <li class="active">
                        <a href="{{ url('siswa') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url ('lihat-materi')}}">
                            <i class="material-icons">perm_media</i>
                            <span>Lihat Materi</span>
                        </a>
                    </li>
                    <!-- SideBar Menu for Admin -->
                    @elseif (Auth::guard('admin')->check()) 
                    <li class="active">
                        <a href="{{ url('admin') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Input Nilai</span>
                        </a>
                        <ul class="ml-menu">    

                        @foreach ($kelass as $kelas)
                            <li>
                                <a href="{{ url ('input-nilai/'.$kelas->id)}}">Kelas - {{ $kelas->nama_kelas }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    @endif


                </ul>
            </div>