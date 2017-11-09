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
            <?php
                if ($isLoggedIn){
                    echo '
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ' . $username . '
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <h6 class="dropdown-header">Signed in as:
                                        <b>' . $username . '</b>
                                    </h6>
                                    <a class="dropdown-item" href="/panel">User Panel</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="auth/logout">
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
                                <a class="nav-link" href="register">Register</a>
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