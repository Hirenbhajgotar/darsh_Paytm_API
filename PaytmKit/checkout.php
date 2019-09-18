<?php
// db file include
include 'db.php';

// if user not logedin
if (!isset($_SESSION['userid'])) {
    header('LOCATION: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/uikit.min.css">
    <!-- fontawsome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
</head>
<body>
<!-- navbar -->
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <nav style="background-color:#389df3" class="uk-light uk-navbar-container" uk-navbar style="position: relative; z-index: 980;">
            <div class="uk-navbar-left">
                <div class="uk-container">
                    <a href="index.php" class="uk-logo">LOGO</a>
                </div>
            </div>
            <div class='uk-navbar-right'>
                <div class='uk-container uk-container-large'>
                    <ul class="uk-navbar-nav">
                        <!-- <li class="uk-active"><a href="index.php">Mobile</a></li> -->
                        <div class='uk-navbar-item'>
                           <?php
                            if (isset($_SESSION['userid'])) {
                                ?>
                                <li class="uk-active">
                                    <a href="" style="border-radius:500px" class='uk-button uk-button-default'>My account</a>
                                    <div class="uk-navbar-dropdown" uk-dropdown=" pos: bottom-center">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <!-- <li><a href="orders.php" style="font-size: 17px"><i class="fas fa-shopping-bag" style="color:#389df3"></i> &nbsp; Orders</a></li> -->
                                            <li class=""><a href="logout.php" style="font-size: 17px"><i class="fas fa-power-off" style="color:#389df3"></i> &nbsp; Logout</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="uk-active"><a style="border-radius:500px" class='uk-button uk-button-default' href="login.php">login</a></li>
                                <?php
                            }
                            ?>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    

    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = get_data($id);
            $data = $result->fetch_assoc();
        }
    ?>
    <div class="uk-section uk-section-small">
        <div class="uk-container uk-container-small">
            <div class="uk-flex-center uk-child-width-1-1@m" uk-grid>
                <div>
                    <ul class='uk-flex-center ' uk-tab>
                        <li class="uk-active"><a href="#" class='uk-text-bold'>Order Summery</a></li>
                        <li><a href="#" class='uk-text-bold'>Delivry Address</a></li>
                    </ul>

                    <ul class="uk-switcher uk-margin">
                        <li>
                            <div class='uk-background-primary'>
                                <h5 class="uk-padding-small uk-light uk-text-uppercase uk-text-bold">Order Summery</h5>
                            </div>
                            <table class="uk-table uk-table-justify uk-table-responsive">
                                <tbody>
                                    <tr>
                                        <td class="">
                                            <img style="width:80px; height:auto" src="assets/img/mobile/<?= $data['image'] ?>" alt="">
                                        </td>
                                        <td>
                                            <h4 class='uk-header'><?= $data['name'] ?></h4>
                                            <h3 class="uk-margin-remove-top"><?= number_format($data['price'], '2', '.', ',') ?> 
                                            </h3>
                                            <p class="uk-text-small">2 GB RAM</p>
                                            <del><?= number_format($data['price'] + 1500, '2', '.', ',') ?></del> <span style="color:green"> 10% Off 3 Offers Available</span>
                                            <!-- <p>qty: <?= $data['qty'] ?></p> -->
                                        </td>
                                        <td>
                                            <p class="uk-text-small uk-text-secondary">Delivery by Sat Aug 31 | <span style="color:green">Free</span> <del>₹40</del></p>
                                            <p class="uk-text-small uk-uk-text-muted">10 Days Replacement Policy</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li>
                            <div class='uk-background-primary'>
                                <h5 class="uk-padding-small uk-light uk-text-uppercase uk-text-bold">DELIVERY ADDRESS</h5>
                            </div>
                            <form action="db.php" method="post" class="uk-grid-small" autocomplete="on" uk-grid>
                                <input type="hidden" name="PRODUCT_ID" value="<?= $data['id'] ?>">
                                <input type="hidden" name="PRODUCT_PRICE" value="<?= $data['price'] ?>">
                                <div class="uk-width-1-2@s">
                                    <input class="uk-input" 
                                        type="text"
                                        name="buyer_name"
                                        pattern="[A-Za-z]{,30}"
                                        title="Please Enter Your Valid Name"
                                        autocomplete="on"
                                        placeholder="Name"
                                        required>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <input class="uk-input" 
                                        name="buyer_mo" 
                                        type="text"
                                        pattern="[0-9]{10}"
                                        title="Please Enter 10 Degit Mobile Number"
                                        placeholder="10-Degit Valid Mobile Number"
                                        required>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <input class="uk-input" 
                                        name="buyer_pincode" 
                                        type="text" 
                                        pattern="[0-9]{,6}"
                                        title="Please Enter Valid Pincode Number"
                                        placeholder="Pincode"
                                        required>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <input class="uk-input" 
                                        name="buyer_city" 
                                        type="text" 
                                        pattern="[A-Za-z]{0,15}"
                                        title="Please Enter Your City"
                                        placeholder="City/District/Town"
                                        required>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <input class="uk-input" 
                                        name="buyer_state" 
                                        type="text" 
                                        pattern="[A-Za-z]{0,15}"
                                        title="Please Enter Your Sate"
                                        placeholder="State"
                                        required>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <input class="uk-input" 
                                        name="buyer_country" 
                                        type="text" 
                                        pattern="[A-Za-z]{0,12}"
                                        title="Please Enter Your Country"
                                        placeholder="Country"
                                        required>
                                </div>
                                <div class="uk-width-1-1@s">
                                    <textarea class="uk-textarea" 
                                        name="buyer_address" 
                                        rows="5" 
                                        placeholder="Address (Area and Street)"
                                        required></textarea>
                                </div>
                                <div class="uk-width-1-1@s">
                                    <button type="submit" name="buyerDetilabtn" class='uk-button uk-button-large uk-button-danger'>continue</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                
            </div>

        </div>
    </div>
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>

    <script>
        function update_qty(obj, rowid){
            $.ajax({
                url: '<?= site_url('Ecommerce/update_cart') ?>',
                type: 'GET',
                data: {rowid: rowid, qty: obj.value},
                success: function(){
                    location . reload();

                },
                error: function(){
                    UIkit.notification({
					    message: 'cant update! please try again ',
					    pos: 'bottom-center',
					    timeout: 5000
					});
                }
            })

        }
    </script>
</body>
</html>