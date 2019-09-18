<?php
session_start();


// establis connection
$con = '';
function connection()
{
    $con = new mysqli('localhost', 'root', '', 'darshil_project');

    if ($con->connect_error) {
        die("connection failed" . $con->connect_error);
    }
    // else{
    //     echo 'conn';
    // }
    return $con;
}

// get data
function get_data($id = '')
{
    $dbquery = '';
    if ($id) {
        $dbquery = "SELECT * FROM `mobiles` WHERE `id` = $id";

    } else {
        $dbquery = "SELECT * FROM `mobiles`";

    }
    return $result = connection()->query($dbquery);

}

// user login
function user_logedin($email, $pass)
{
    $user_query = "SELECT * FROM `user` WHERE `buyer_email` = '$email' AND `buyer_pass` = '$pass'";
    $user_result = connection()->query($user_query);
    
    if ($user_result->num_rows > 0) {
        return $data = $user_result->fetch_assoc();
    }
    else{
        return false;
    }
}


// check user logedin or not.
if (isset($_GET['action']) AND isset($_GET['id'])) {
    $id = $_GET['id'];
    callcheck($id);
}
function callcheck($id)
{
   if (isset($_SESSION['userid'])) {
       header('LOCATION: checkout.php?id='.$id);
    }
    else{
        header("LOCATION: login.php?callbuy=true&id=".$id);
   }
}

// submit buyer's details
if (isset($_POST['buyerDetilabtn'])) {
    insert_buyer_details();
}
function insert_buyer_details(){
    
    $user_id = $_SESSION['userid'];
    $name    = strip_tags($_POST['buyer_name']);
    $mobile  = strip_tags($_POST['buyer_mo']);
    $picode  = strip_tags($_POST['buyer_pincode']);
    $city    = strip_tags($_POST['buyer_city']);
    $state   = strip_tags($_POST['buyer_state']);
    $country = $_POST['buyer_country'];
    $address = strip_tags($_POST['buyer_address']);
    $PRODUCT_ID = strip_tags($_POST['PRODUCT_ID']);
    $PRODUCT_PRICE = strip_tags($_POST['PRODUCT_PRICE']);


    // store user detail into session
    $_SESSION['user_id'] = $user_id;
    $_SESSION['buyer_name'] = $name;
    $_SESSION['buyer_mobile'] = $mobile;
    $_SESSION['buyer_pincode'] = $picode;
    $_SESSION['buyer_city'] = $city;
    $_SESSION['buyer_state'] = $state;
    $_SESSION['buyer_country'] = $country;
    $_SESSION['buyer_address'] = $address;
    $_SESSION['PRODUCT_ID'] = $PRODUCT_ID;
    $_SESSION['PRODUCT_PRICE'] = $PRODUCT_PRICE;
    
    header('LOCATION: TxnTest.php');

}