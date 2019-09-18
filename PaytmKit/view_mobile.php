<?php
    // session_start();

   $id = $_GET['id'];
    // include database file
    include 'db.php';
   
    // call function 
    $res = get_data($id)->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $_GET['name'] ?> | Mobile</title>
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
                    <a href="#!" class="uk-logo">LOGO</a>
                </div>
            </div>
            <div class='uk-navbar-right'>
                <div class='uk-container uk-container-large'>
                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><a href="index.php"><?= $_GET['name'] ?> | Mobile</a></li>
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


    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-divider  " uk-grid>
                <div class='uk-width-1-3@m'>
                    <div class='uk-text-center'>
                        <div class='' uk-sticky="offset: 90; " style="z-index: 980;">
                            <img src="assets/img/mobile/<?= $res['image'] ?>" alt=""><br>
                            <div class='uk-margin-top'>
                                <a href='db.php?action=callcheck&id=<?= $id ?>' class="uk-button uk-button-large uk-text-bold uk-button-danger">
                                    <span uk-icon="icon: bolt"></span> buy now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='uk-width-1-2@m'>
                    <div class=''>
                        <h3><?= $res['name'] ?></h3>
                        <span class='uk-text-small' style="color:green">Extra 10% discount</span>
                        <h3>
                            <?php
                                $price = number_format($res['price'],'2','.',',');
                                echo $price;
                            ?>
                        </h3>
                        <span class='uk-text-small'><del><?= number_format($res['price'] + 1500, '2', '.', ',') ?></del></span>
                        <span class='uk-text-small' style="color:green">14% off</span>

                        
                    </div>

                    <div class="uk-margin-top uk-margin-bottom">
                        <p class="uk-text-small uk-margin-remove">
                            <span class="uk-text-primary" uk-icon="icon: tag"></span>
                            Special PriceExtra ₹1000 discount(price inclusive of discount) <span
                                class="uk-text-primary uk-text-bold">T&C</span>
                        </p>
                        <p class="uk-text-small uk-margin-remove">
                            <span class="uk-text-primary" uk-icon="icon: tag"></span>
                            Bank Offer5% Instant Discount on Axis Bank Credit and Debit Cards <span
                                class="uk-text-primary uk-text-bold">T&C</span>
                        </p>
                        <p class="uk-text-small uk-margin-remove">
                            <span class="uk-text-primary" uk-icon="icon: tag"></span>
                            Bank OfferExtra ₹250 off on Axis Bank EMI transactions <span
                                class="uk-text-primary uk-text-bold">T&C</span>
                        </p>
                    </div>
                    <hr>
                    
                    <div>
                        <table class="uk-table uk-table-justify uk-table-small">
                            <tbody>
                                <tr>
                                    <td class="uk-text-muted uk-text-small">Delivery</td>
                                    <td class="uk-text-small">
                                        <p>Delivery in2 Days, Tuesday</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-muted uk-text-small">Highlights</td>
                                    <td class="uk-text-small">
                                        <ul class="uk-list uk-list-bullet">
                                            <?php
                                                // details
                                                $arr = explode('#', $res['details']);
                                                foreach ($arr as $key => $value) {
                                                    ?>
                                                        <li><?= $value ?></li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-muted uk-text-small">Seller</td>
                                    <td class="uk-text-small">
                                        <ul class="uk-list uk-list-bullet">
                                            <li>10 Days Replacement Policy</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-muted uk-text-small">Description</td>
                                    <td class="uk-text-small">
                                        <p>NA</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>

                    <!-- General -->
                    <div>
                        <h3 class="uk-text-bold">Specifications</h3>
                        <p class="uk-text-emphasis uk-text-large">General</p>
                        <table class="uk-table uk-table-justify uk-table-small ">
                            <tbody>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">In The Box</td>
                                    <td class="uk-text-small">Handset, Adapter (5V/1A), Micro-USB Cable, Important
                                        Information Booklet with Warranty Card, Quick Guide, SIM Card Tool, Screen Protect
                                        Film</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Model Number</td>
                                    <td class="uk-text-small">RMX1945</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Color</td>
                                    <td class="uk-text-small">Diamond Black</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Browse Type</td>
                                    <td class="uk-text-small">Smartphones</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">SIM Type</td>
                                    <td class="uk-text-small">Dual Sim</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Hybrid Sim Slot</td>
                                    <td class="uk-text-small">No</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">OTG Compatible</td>
                                    <td class="uk-text-small">Yes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>

                    <!-- Display Features -->
                    <div>
                        <p class="uk-text-emphasis uk-text-large">Display Features</p>
                        <table class="uk-table uk-table-justify uk-table-small">
                            <tbody>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Display Size</td>
                                    <td class="uk-text-small">15.49 cm (6.1 inch)</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Resolution</td>
                                    <td class="uk-text-small">1560 x 720 pixels</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">GPU</td>
                                    <td class="uk-text-small">GE8320</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>

                    <!-- Os & Processor Features -->
                    <div>
                        <p class="uk-text-emphasis uk-text-large">Os & Processor Features</p>
                        <table class="uk-table uk-table-justify uk-table-small ">
                            <tbody>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Operating System</td>
                                    <td class="uk-text-small">Android Pie 9.0</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Processor Type</td>
                                    <td class="uk-text-small">MediaTek P22 Octa Core 2.0 GHz</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Processor Core</td>
                                    <td class="uk-text-small">Octa Core</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Primary Clock Speed</td>
                                    <td class="uk-text-small">2 GHz</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>

                    <!-- Memory & Storage Features -->
                    <div>
                        <p class="uk-text-emphasis uk-text-large">Memory & Storage Features</p>
                        <table class="uk-table uk-table-justify uk-table-small ">
                            <tbody>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Operating System</td>
                                    <td class="uk-text-small">Android Pie 9.0</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Processor Type</td>
                                    <td class="uk-text-small">MediaTek P22 Octa Core 2.0 GHz</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Processor Core</td>
                                    <td class="uk-text-small">Octa Core</td>
                                </tr>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Primary Clock Speed</td>
                                    <td class="uk-text-small">2 GHz</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>

                    <!-- Battery & Power Features -->
                    <div>
                        <p class="uk-text-emphasis uk-text-large">Battery & Power Features</p>
                        <table class="uk-table uk-table-justify uk-table-small ">
                            <tbody>
                                <tr>
                                    <td class="uk-text-small uk-text-muted">Battery Capacity</td>
                                    <td class="uk-text-small">4000 mAh</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>
</body>
</html>