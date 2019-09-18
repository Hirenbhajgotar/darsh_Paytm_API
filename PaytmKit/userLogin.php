<?php
// session is allready start in db.php file.

// include databsae file
include 'db.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $id = $_POST['id'];


    // call user_logedin function
    $data = user_logedin($email, $pass);
    $userid = $_SESSION['userid'] = $data['id'];
    
    if ($data) {
        // store data inot sassion
        $_SESSION['userid'] = $data['id'];
        $_SESSION['useremail'] = $data['buyer_email'];
    }
    else{
        $_SESSION['usercantget'] = 'Email or Password dont Match';
    }

    
    if (isset($_POST['callbuy'])) {
        // if request is by buynow btn
        header('LOCATION: checkout.php?id='.$id);
    }
    else{
        // default
        header('LOCATION: index.php');
    }
    

}






?>