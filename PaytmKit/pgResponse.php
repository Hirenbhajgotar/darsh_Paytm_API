	<?php
	// session_start();

	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	include 'db.php';

	// if user not logedin
	if (! isset($_SESSION['userid'])) {
		header('LOCATION: login.php');
		exit;
	}


	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");


	$paytmChecksum = "";
	$paramList = array();
	$isValidChecksum = "FALSE";

	$paramList = $_POST;
	$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

	//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
	$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


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
    <nav style="background-color:#389df3" class="uk-light uk-navbar-container uk-margin" uk-navbar>
		<div class="uk-navbar-left">
			<a class="uk-navbar-item uk-logo" href="index.php">Logo</a>
		</div>
	</nav>

	<div class="uk-section uk-section-small">
		<div class="uk-container uk-container-small">
			<div class="uk-flex-center" uk-grid>
				<?php
					if ($isValidChecksum == "TRUE") {
						// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
						if ($_POST["STATUS"] == "TXN_SUCCESS") {
							// echo "<b>Transaction status is success</b>" . "<br/>";

							//Process your transaction here as success transaction.
							//Verify amount & order id received from Payment gateway with your application's order id and amount.
						
							?>
								<div class='uk-width-1-1 uk-flex uk-flex-center@m'>
									<div class='uk-text-center'>
										<div class='uk-margin'>
											<i class="fas fa-check-circle uk-text-success" style="font-size:80px"></i>
										</div>
										<h2>Payment Successful</h2>
										<p>
											Your transaction is complated successfully. You will receive the payment confirmation shortly.
										</p>
									</div>
								</div>
							<?php


						} else {
							// echo "<b>Transaction status is failure</b>" . "<br/>";
							?>
								<div class='uk-width-1-1 uk-flex uk-flex-center@m'>
									<div class='uk-text-center'>
										<div class='uk-margin'>
											<i class="fas fa-sad-tear" style="font-size:80px"></i>
										</div>
										<h2>Transaction status is failure</h2>
									</div>
								</div>
							<?php
						}

						// when user refresh page or click back button
						if (isset($_SESSION['noBack'])) {
							// echo 'set';
						} else {
							header('LOCATION: index.php');
							exit;
						}
						unset($_SESSION['noBack']);


						if (isset($_POST) && count($_POST) > 0) {
							// foreach ($_POST as $paramName => $paramValue) {
							// 	echo "<br/>" . $paramName . " = " . $paramValue;
								
							// }
																															$orderid        = $_POST["ORDERID"];
							$mid     	    = $_POST['MID'];
							$status     	= $_POST['STATUS'];
							$txnid     	    = $_POST['TXNID'];
							$txnamount      = $_POST['TXNAMOUNT'];
							$paymentmod     = $_POST['PAYMENTMODE'];
							$txndate     	= $_POST['TXNDATE'];
							$userid   	   = $_SESSION['user_id'];
							$buyer_name    = $_SESSION['buyer_name'];
							$buyer_mobile  = $_SESSION['buyer_mobile'];
							$buyer_pincode = $_SESSION['buyer_pincode'];
							$buyer_city    = $_SESSION['buyer_city'];
							$buyer_state   = $_SESSION['buyer_state'];
							$buyer_country = $_SESSION['buyer_country'];
							$buyer_address = $_SESSION['buyer_address'];
							$product_id    = $_SESSION['PRODUCT_ID'];

							// insert buyer details into databse
							$in_query = "INSERT INTO `buying_product`
								(status, order_id, m_id, txn_id, txn_amount, payment_mod, txn_date, user_id, name, mobile_no, pincode, city, state, country, address, product_id) 
								VALUES ('$status', '$orderid', '$mid', '$txnid', '$txnamount', '$paymentmod', '$txndate', '$userid', '$buyer_name', '$buyer_mobile', '$buyer_pincode', '$buyer_city', '$buyer_state', '$buyer_country', '$buyer_address', '$product_id' )";
							
							if (connection()->query($in_query) === true) {
								
								?>
									<div class='uk-width-1-1 '>
										<div class='uk-container uk-container-xsmall'>
											<table class="uk-table uk-table-justify uk-table-divider uk-table-responsive">
												<tbody class=''>
													<tr>
														<td class='uk-width-1-2'>Order ID</td>
														<td class='uk-width-1-2  uk-margin-remove-bottom'><?= $_POST['ORDERID'] ?></td>
													</tr>
													<tr>
														<td class='uk-width-1-2'>Txn ID</td>
														<td class='uk-width-1-2  uk-margin-remove-bottom'><?= $_POST['TXNID'] ?></td>
													</tr>
													<tr>
														<td class='uk-width-1-2'>Txn Date & Time</td>
														<td class='uk-width-1-2  uk-margin-remove-bottom'><?= $_POST['TXNDATE']; ?></td>
													</tr>
													<tr>
														<td class='uk-width-1-2'>Amount</td>
														<td class='uk-width-1-2  uk-margin-remove-bottom'><?= number_format($_POST['TXNAMOUNT'], '2', '.', ',');  ?></td>
													</tr>
													<tr>
														<td class='uk-width-small'>Txn Mode</td>
														<td class='uk-table-expand  uk-margin-remove-bottom'><?= $_POST['PAYMENTMODE']; ?></td>
													</tr>
												</tbody>
											</table>
											<div class='uk-margin'>
												<a href="index.php" class='uk-button uk-button-danger uk-button-large'>  
												<span uk-icon="icon: arrow-left"></span> back to home</a>
											</div>
										</div>
									</div>
								<?php
							}
							else{
								echo 'Somthing wrong try again !!';
							}
							
						}

					} else {
						?>
							<div class='uk-text-center'>
								<p><i class="fas fa-sad-tear" style="font-size:80px"></i></p>
								<b>Checksum mismatched.</b>
								<div class='uk-margin-large'>
									<a href="index.php" class='uk-button uk-button-danger uk-button-large'><span uk-icon="icon: arrow-left"></span> back to home</a>
								</div>
							</div>
						<?php
						//Process transaction as suspicious.
					}

				?>
				
			</div>
		</div>
	</div>
<?php





?>

	
	

	<script src="assets/js/uikit.min.js"></script>
	<script src="assets/js/uikit-icons.min.js"></script>
	<!-- <script src="assets/js/jquery-3.3.1.min.js"></script> -->
	<script src = "http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


	<!-- prevent resubmission -->
	<script type="text/javascript">
		if (window . history . replaceState) {
			window . history . replaceState(null, null, window . location . href);
		}
	</script>
	
</body>
</html>