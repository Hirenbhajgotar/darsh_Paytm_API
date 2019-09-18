<?php
    // session_start();
    // include databse file
    include 'db.php';

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My mobile</title>
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
                    <ul class="uk-navbar-nav ">
                        <div class="uk-navbar-item">
                            <!-- <li class="uk-active"><a href="index.php">Mobile</a></li> -->
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
                            }
                            else{
                                ?>
                                <li class="uk-active">
                                    <a href="login.php" style="border-radius:500px" class='uk-button uk-button-default'>login</a>
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
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                <?php
                    $query = "SELECT * FROM `mobiles_brands_name`";
                    $result = connection()->query($query);

                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            ?>
                                <div>
                                    <div class="uk-card uk-card-small uk-card-default uk-text-center uk-card-body">
                                        <a href="mobile.php?id=<?= $data['id'] ?>" class="uk-link-reset">
                                            <img data-src="assets/img/<?= $data['img'] ?>" alt="" uk-img>
                                            <h3 class="uk-card-title uk-text-capitalize uk-text-bold uk-text-emphasis uk-margin-remove-top"><?= $data['name'] ?></h3>
                                        </a>
                                    </div>
                                </div>
                            <?php
                        }
                    }

                ?>
                
            </div>

        </div>
    </div>



    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>
</body>
</html>