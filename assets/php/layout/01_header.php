<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">VHG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav col-md-10">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aboutus">About us</a>
                </li>
            </ul>
            <!-- Login here
                @if(Auth::guest())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->usr }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <h6 class="dropdown-header">Signed in as:
                                <b>{{ Auth::user()->usr }}</b>
                            </h6>
                            <a class="dropdown-item" href="/panel">User Panel</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
                
                @endif
            -->
            <?php
                session_start();
                if (isset($_SESSION['usr']) && isset($_SESSION['user_id'])){
                    echo '
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ' . $_SESSION['usr'] . '
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <h6 class="dropdown-header">Signed in as:
                                        <b>' . $_SESSION['usr'] . '</b>
                                    </h6>
                                    <a class="dropdown-item" href="/panel">User Panel</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    ';
                }else{
                    echo '
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#loginModal" data-toggle="modal" data-target="#loginModal">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                        </ul>
                    ';
                }


            ?>
            <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul> -->
        </div>
    </nav>