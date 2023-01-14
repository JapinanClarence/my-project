<?php
if (isset($_POST['submit'])) {

    //Grabs data from signup form
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    //instantiate SignupContr class
    // require 'LoginController.class.php';
    // $signUp = new LoginController($username, $password);

    // //Running error handlers and user signup
    // $signUp->loginUser();
    
    //going back to fron page
    // header("location:../?error=none");
}
//header
require 'views/includes/header.inc.php';
//banner
require 'views/includes/banner.inc.php';

// content
require 'views/cart.view.php';
//end of content



//footer
require 'views/includes/footer.inc.php';
