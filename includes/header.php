<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
    <div class="container">

        <?php
            if(isset($_SESSION['login_client'])){
        ?>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php"><img src="./assets/img/logo.png"></a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>

                <li><ul class="nav navbar-nav">
                    <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-road"></span> Cars <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="car-list.php">Car List</a></li>
                            <li><a href="add-car.php">Add Car</a></li>
                            <li><a href="delete-car.php">Delete Car</a></li>
                            <li><a href="return-car.php">Return Car</a></li>
                        </ul>
                    </li>
                </ul></li>

                <li><a href="show-reviews.php"><span class="glyphicon glyphicon-stats"></span> Reviews</a></li>
                <li><a href="faq.php"><span class="glyphicon glyphicon-question-sign"></span> FAQ</a></li>

                <li><ul class="nav navbar-nav">
                    <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Welcome <?php echo $_SESSION['login_client']; ?> <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="add-driver.php">Add Driver</a></li>
                            <li><a href="reservation-list.php">Reservation List</a></li>
                            <li><a href="booking-list.php">Booking List</a></li>
                        </ul>
                    </li>
                </ul></li>

                <li>
                    <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>
            
        <?php
            }else if(isset($_SESSION['login_customer'])){
        ?>
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php">Accel</a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="car-list.php"><span class="glyphicon glyphicon-road"></span> Cars</a></li>
                <li><a href="show-reviews.php"><span class="glyphicon glyphicon-stats"></span> Reviews</a></li>
                <li><a href="faq.php"><span class="glyphicon glyphicon-question-sign"></span> FAQ</a></li>
                    
                <li><ul class="nav navbar-nav">
                    <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?> <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="my-reservations.php">My Reservations</a></li>       
                            <li><a href="my-bookings.php">My Bookings</a></li>
                        </ul>
                    </li>
                </ul></li>

                <li>
                    <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>

        <?php
            }else{
        ?>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php"><img src="./assets/img/logo.png"></a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="car-list.php"><span class="glyphicon glyphicon-road"></span> Cars</a></li>
                <li><a href="show-reviews.php"><span class="glyphicon glyphicon-stats"></span> Reviews</a></li>
                <li><a href="customer-login.php"><span class="glyphicon glyphicon-user"></span> Customer</a></li>
                <li><a href="client-login.php"><span class="glyphicon glyphicon-cog"></span> Admin</a></li>
                <li><a href="faq.php"><span class="glyphicon glyphicon-question-sign"></span> FAQ</a></li>
            </ul>
        </div>

        <?php   
            }
        ?>

    </div>
</nav>