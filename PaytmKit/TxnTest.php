<?php
	session_start();
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// if user not logedin
	if (! isset($_SESSION['userid'])) {
		header('LOCATION: login.php');
		exit;
	}

	$_SESSION['noBack'] = true;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Merchant Check Out Page</title>
	<meta name="GENERATOR" content="Evrsoft First Page">
	<link rel="stylesheet" href="assets/css/uikit.min.css">
</head>
<body>
	<!-- navbar -->
    <nav style="background-color:#389df3" class="uk-light uk-navbar-container uk-margin" uk-navbar>
		<div class="uk-navbar-left">
			<a class="uk-navbar-item uk-logo" href="#">Logo</a>
		</div>
	</nav>

	<div class="uk-section ">
		<div class="uk-container uk-container-small">
			<h2 class="uk-heading-bullet">Merchant Check Out Page</h2>
			<div class=" uk-child-width-1-1@m" uk-grid>
				<div>
					<form action="pgRedirect.php" method="post">
						<table class="uk-table uk-table-middle">
							<tbody>
								
								<tr>
									<td class='uk-width-small'>ORDER ID</td>
									<td>
										<?php $ran = rand(10000,99999999); ?>
										<pre class='uk-margin-remove'><?= "ORDS".$ran ?></pre>
										<input id="ORDER_ID" 
											type="hidden"
											class='uk-input'
											tabindex="1" 
											maxlength="20" 
											size="20"
											name="ORDER_ID" 
											autocomplete="off"
											value="<?php echo  "ORDS" . $ran?>">
									</td>
								</tr>
								<tr>
									<td class='uk-width-small'>CUSTMER ID</td>
									<td>
										<pre class='uk-margin-remove'>CUST<?= $_SESSION['userid'] ?></pre>
										<input id="CUST_ID"
											type="hidden"
											class='uk-input' 
											tabindex="2" 
											maxlength="12" 
											size="12" 
											name="CUST_ID" 
											autocomplete="off" 
											value="CUST<?= $_SESSION['userid'] ?>">
									</td>
								</tr>
								<tr>
									<td class='uk-width-small'>AMOUNT</td>
									<td>
										<pre class='uk-margin-remove'><?= number_format($_SESSION['PRODUCT_PRICE'], '2', '.', ','); ?></pre>
										<!-- industry type -->
										<input id="INDUSTRY_TYPE_ID" 
											tabindex="4" 
											type="hidden"
											maxlength="12" 
											size="12" 
											name="INDUSTRY_TYPE_ID" 
											autocomplete="off" 
											value="Retail">

										<!-- channel -->
										<input id="CHANNEL_ID"
											type="hidden" 
											tabindex="4" 
											maxlength="12"
											size="12" 
											name="CHANNEL_ID" 
											autocomplete="off" 
											value="WEB">

										<!-- amount -->
										<input title="TXN_AMOUNT" 
											class='uk-input'
											tabindex="10"
											type="hidden" 
											name="TXN_AMOUNT"
											value="<?= $_SESSION['PRODUCT_PRICE']; ?>"
											>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button type="submit" 
											class='uk-button uk-button-danger uk-button-large'
											onclick=""> continue
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	

	<script src="assets/js/uikit.min.js"></script>
</body>
</html>