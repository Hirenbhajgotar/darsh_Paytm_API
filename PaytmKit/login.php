<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login </title>
    <link rel="stylesheet" href="assets/css/uikit.min.css">
</head>
<body>
    <!-- navbar -->
    <nav class="uk-navbar-container uk-margin uk-light" style="background-color:#389df3" uk-navbar>
        <div class="uk-navbar-center">
            <a class="uk-navbar-item uk-logo" href="index.php">Logo</a>
        </div>
    </nav>


    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-match uk-flex-center uk-child-width-1-2@m" uk-grid>
                <div>
                    <div class=''>
                        <form action='userLogin.php' method="post">
                            <fieldset class="uk-fieldset">
                            <?php
                                if (isset($_GET['callbuy']) and isset($_GET['id'])) {
                                    $callbuy = $_GET['callbuy'];
                                    $id = $_GET['id'];
                                    ?>
                                        <input type="hidden" name="callbuy" value="<?= $callbuy ?>">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                    <?php
                                }
                            ?>
                                <legend class="uk-legend">Login</legend>
                                <?php
                                if (isset($_SESSION['usercantget'])) {
                                    ?>
                                    <span class='uk-text-small uk-text-danger'><?= $_SESSION['usercantget']; ?></span>
                                    <?php
                                    unset($_SESSION['usercantget']);
                                }
                                ?>
                                <div class="uk-margin">
                                    <input class="uk-input" name="email" type="email" placeholder="Enter Your Email" required>
                                </div>
                                <div class="uk-margin">
                                    <input class="uk-input" name="pass" type="password" placeholder="Enter Your Password" required>
                                </div>
                                <div class="uk-margin">
                                    <button type="submit" name="submit" class='uk-button uk-button-primary'>login</button>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div> -->
            </div>

        </div>
    </div>




    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>
</body>
</html>