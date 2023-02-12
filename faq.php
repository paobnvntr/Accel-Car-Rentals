<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Accel</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- css files -->
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom/style-faq.css">
</head>

<body style="padding-top: 2rem;">

    <?php include 'includes/header.php'; ?>

    <section class="cd-faq">
        <ul class="cd-faq-categories">
            <li><a class="selected" href="#basics">Basics</a></li>
            <li><a href="#membership">Membership</a></li>
        </ul>

        <div class="cd-faq-items">
            <ul id="basics" class="cd-faq-group">
                <li class="cd-faq-title">
                    <h2>Basics</h2>
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">How do I pay for my Rental?</a>
                    <div class="cd-faq-content">
                        <p>Accel gladly accepts credit cards. To pay for your rental using a credit card, simply provide the rental company with your credit card information through our secure payment portal.</p>
                    </div>
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">What if i find a better rate for a rental car?</a>
                    <div class="cd-faq-content">
                        <p>One of the many great things about Accel is our rental rates and services are guaranteed to be the very best in the industry. If you come across a lower price from a competitor and the rate is on a comparable vehicle including the same terms, locations, and rental car fees we will be glad to beat the price for you.
                    </div>
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Is there a penalty fee if i return the car after the due date?</a>
                    <div class="cd-faq-content">
                        <p>Yes, we charge ₱200/- day after the due date.</p>
                    </div>
                </li>
            </ul>

            <ul id="membership" class="cd-faq-group">
                <li class="cd-faq-title">
                    <h2>Membership</h2>
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">Why should i sign up?</a>
                    <div class="cd-faq-content">
                        <p>When you sign-up to be a member on our site,  we give you the opportunity to sign-up for our email newsletter which will keep you up-to-date on the latest specials and incentives we're offering.</p>
                    </div>
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">How do I login?</a>
                    <div class="cd-faq-content">
                        <p>Once you sign-up, we will re direct you to the log in screen. When you are logged in, you will see a small bar in the upper right corner of the screen welcoming to you our site. If you already have set up an account but have logged out, you can either click on the 'Customer' button on our menu bar which takes you to our log-in page.</p>
                    </div>
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">What about my privacy?</a>
                    <div class="cd-faq-content">
                        <p>Your privacy is very important to us. As long as you do not share your username and password with others, no one will be able to see or edit your personal information.</p>
                    </div>
                </li>
            </ul>
        </div>
        <a href="#0" class="cd-close-panel">Close</a>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/faq/modernizr.js"></script>
    <script src="assets/js/faq/jquery-2.1.1.js"></script>
    <script src="assets/js/faq/jquery.mobile.custom.min.js"></script>
    <script src="assets/js/faq/main.js"></script>

</body>
</html>