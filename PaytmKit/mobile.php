<?php
    // session_start();
    // include database file
    include 'db.php';

    $brandName = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $mbrdQuery = "SELECT * FROM `mobiles_brands_name` WHERE `id` = $id"; 
        
        $mbrdResult = connection()->query($mbrdQuery);
        $mbrdData = $mbrdResult->fetch_assoc();
        $brandName = $mbrdData['name'];
    }
    // echo $brandName;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $brandName ?> Mobile</title>
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
                    <!-- <ul class='uk-navbar-nav'>
                    </ul> -->
                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><a href=""><?= $brandName ?> | Mobile</a></li>
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
                                <li class="uk-active">
                                    <a class="uk-button uk-button-default" style="border-radius:500px" href="login.php">login</a>
                                </li>
                                <?php
                            }
                            ?>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>    

    
    <div class="uk-section">
        <div class="uk-container ">
            <div class="uk-grid-match uk-flex-center uk-child-width-1-1@m" uk-grid>
                <div>
                    <table class="uk-table uk-table-justify uk-table-divider">
                        <tbody>
                        <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];

                                $mobQuery = "SELECT * FROM `mobiles` WHERE `m_brand_id` = $id";
                                $mobResult = connection()->query($mobQuery);

                                while ($mobData = $mobResult->fetch_assoc()) {
                                    $details = $mobData['details'];
                                    $f_details = explode('#', $details);
                                    
                                    ?>
                                        <tr class=''>
                                            <td class='uk-width-1-4' >
                                                <a href="view_mobile.php?id=<?= $mobData['id'] ?>&name=<?= $brandName ?>" class="uk-link-reset">
                                                    <img src="assets/img/mobile/<?= $mobData['image'] ?>" style="width:150px" alt="">
                                                </a>
                                            </td>
                                            <td class='uk-width-1-3'>
                                                <a href="view_mobile.php?id=<?= $mobData['id'] ?>&name=<?= $brandName ?>" class="uk-link-reset">
                                                    <h3 class='uk-card-title ' ><?= $mobData['name'] ?></h3>
                                                    <ul class="uk-list uk-list-bullet uk-text-small">
                                                        <?php
                                                            foreach ($f_details as $key => $value) {
                                                                ?>
                                                                    <li><?= $value ?></li>
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                    </ul>
                                                </a>
                                            </td>
                                            <td class='uk-width-1-3'>
                                                <a href="view_mobile.php?id=<?= $mobData['id'] ?>&name=<?= $brandName ?>" class="uk-link-reset">
                                                    <h3  class="uk-heading">
                                                    <?php
                                                        $price = number_format($mobData['price'], '2','.',',');
                                                        echo $price;
                                                        $o_price = number_format($mobData['price'] + 1500, '2','.',',');

                                                    ?>
                                                    </h3>
                                                    <p class='uk-text-small' >
                                                        <span><del><?= $o_price ?></del></span>
                                                        <span style="color:green">100% off</span>
                                                    </p>
                                                    <span class="uk-text-small">Up to <strong>₹11,900</strong> Off on Exchange EMI starting from <strong>₹565/month</strong></span>
                                                    <ul class="uk-list uk-text-small uk-list-bullet">
                                                        <span style="color:green">Offers</span>
                                                        <li>Special Price</li>
                                                        <li>Bank Offer</li>
                                                    </ul>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }


                            }
                        ?>
                            <!-- <tr>
                                <td class='' >
                                    <img src="assets/img/mobile/mi-redmi-7a-1.jpeg" alt="">
                                </td>
                                <td class='uk-table-expand' >
                                    <ul class="uk-list uk-list-bullet">
                                        <h3 class='uk-card-title' >Redmi 7A (Matte Blue, 32 GB)</h3>
                                        <li>4.456,777 Ratings & 3,980 Reviews</li>
                                        <li>2 GB RAM | 32 GB ROM | Expandable Upto 256 GB</li>
                                        <li>13.84 cm (5.45 inch) HD+ Display</li>
                                        <li>12MP Rear Camera | 5MP Front Camera</li>
                                        <li>4000 mAh Li-Polymer Battery</li>
                                        <li>Qualcomm Snapdragon 439 Processor</li>
                                    </ul>
                                </td>
                                <td class='uk-width-1-3' >
                                    <h3  class="uk-heading" >6,999.00</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, deserunt.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, deserunt.</p>
                                </td>
                            </tr> -->
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>
</body>
</html>