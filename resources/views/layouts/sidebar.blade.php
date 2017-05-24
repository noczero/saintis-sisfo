            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{'/manager'}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <!-- SideBar Menu for Manager -->
                    @if (Auth::guard('manager')->check()) 
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
                    <li>
                        <a href="{{ URL('kelas') }}">
                            <i class="material-icons">text_fields</i>
                            <span>Absensi Kelas</span>
                        </a>
                    </li>
                          
                    @endif


                </ul>
            </div>