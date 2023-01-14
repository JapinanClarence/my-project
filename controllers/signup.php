<?php

if (isset($_POST['submit'])) {

    //Grabs data from signup form
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //instantiate SignupContr class
    require 'SignupController.class.php';
    $signUp = new SignupController($fullName, $email, $username, $password);

    //Running error handlers and user signup
    $signUp->signupUser();
    
    //going back to fron page
    header("location:../?error=none");
}
//header
require 'views/includes/header.inc.php';
//banner
require 'views/includes/banner.inc.php';

// content
require 'views/signup.view.php';
//end of content



//footer
require 'views/includes/footer.inc.php';

