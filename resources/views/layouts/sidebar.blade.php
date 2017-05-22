            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.html">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    @if (Auth::guard('manager')->check() == 'manager') 
                    <li>
                        <a href="{{ URL('kelas') }}">
                            <i class="material-icons">text_fields</i>
                            <span>Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/helper-classes.html">
                            <i class="material-icons">layers</i>
                            <span>Helper Classes</span>
                        </a>
                    </li>         
                    @endif
                </ul>
            </div>