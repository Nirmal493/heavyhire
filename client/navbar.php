<?php include 'links.php' ?>
<header class="bg-teal-950">
        <div class="container">
            <nav>
                <a href="index.php">
                    <img src="images/logo.png" width="100px" alt="">
                    <ul class="nav-links">
                        <!-- <li><a href="#">Company</a></li>
                        <li><a href="#">Safety</a></li>
                        <li><a href="#">Help</a></li> -->
                    </ul>
                </a>
                <div id="not_logged">
                    <ul id="nav-links" class="nav-links">
                        <li><a href="login.php" class="text-white">Log in</a></li>
                        <li><a href="signup.php" class="nav__cta text-white">Sign up</a></li>
                    </ul>
                </div>
                <div id="logged">
                    <ul id="nav-links" class="nav-links">
                        <li><a href="user/profileDashboard.php" id="logged_name" class="nav__cta"></a></li>
                        <li><a id="logged_side_btn" class="text-white">View Available Vehicles</a></li>
                        <li><a href="leaderBoard.php" id="leaderboard" class="text-white"></a></li>
                        <li class="cursor-pointer" ><a id="log_out" class="text-white">Log out</a></li>
                    </ul>
                </div>
                <div class="hamburger">
                    <span class="hamburger-bar"></span><span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </div>
            </nav>
        </div>
    </header>
    <script>
        if(localStorage.getItem('name')){
            document.getElementById('not_logged').style.display = 'none'
            document.getElementById('logged').style.display = 'block'
            document.getElementById('logged_name').innerHTML = localStorage.getItem('name')
            if(localStorage.getItem('type_id') == "1"){
                document.getElementById('logged_name').href = "driver/driverDashboard.php"
                document.getElementById('logged_side_btn').href = "driver/driverDashboard.php"
                document.getElementById('logged_side_btn').innerHTML = "Dashboard"
            }else if(localStorage.getItem('type_id') == "2"){
                document.getElementById('logged_side_btn').href = "availableVehicles.php"
                document.getElementById('logged_side_btn').innerHTML = "View available vehicles"
                document.getElementById('leaderboard').innerHTML = "Leaderboard"
                document.getElementById('leaderboard').style.display = "block"
            }
        }else{
            document.getElementById('not_logged').style.display = 'block'
            document.getElementById('logged').style.display = 'none'
        }
        document.getElementById('log_out').addEventListener('click', () =>{
            localStorage.removeItem('acc_id')
            localStorage.removeItem('type_id')
            localStorage.removeItem('email')
            localStorage.removeItem('name')
            localStorage.removeItem('loggedIn')
            window.location.reload()
        })
    </script>