<?php
    include('login_customer.php');

    if (isset($_SESSION['login_customer'])) {
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login | Accel</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- css files -->
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom/style.css">
</head>

<body style="padding-top: 80px;">

    <?php include 'includes/header.php'; ?>

    <div class="container" style="padding-bottom: 2%;">
        <div class="jumbotron">
            <h1 class="text-center">Accel - Customer Panel</span></h1>
            <br>
            <p class="text-center">Please LOGIN to continue.</p>
        </div>
    </div>

    <div class="container" style="margin-top: -2%; margin-bottom: 2%;">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading text-center login-form">LOGIN</div>
                <div class="panel-body">
                    <div class="text-center">
                        <label style="margin-left: 5px; color: red;"><span> <?php echo $error;  ?> </span></label> <!-- error prompt -->
                    </div>
                    <form action="" method="POST">

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="customer_username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
                                <div class="input-group">
                                    <input class="form-control" id="customer_username" type="text" name="customer_username" placeholder="Username" required="" autofocus="">
                                    <span class="input-group-btn">
                                        <label class="btn btn-primary login-btn"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
                                    </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="customer_password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
                                <div class="input-group">
                                    <input class="form-control" id="customer_password" type="password" name="customer_password" placeholder="Password" required="">
                                    <span class="input-group-btn">
                                        <label class="btn btn-primary login-btn"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 2%; padding-bottom: 2%;">
                                <div class="form-group text-center">
                                    <button class="login-btn btn btn-primary" name="submit" type="submit" value=" Login ">LOGIN</button>
                                </div>
                        </div>

                        <div class="text-center">
                            <label class="login-label">Don't have an account? <a href="customer-signup.php">Create a new account</a></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    
</body>
</html>