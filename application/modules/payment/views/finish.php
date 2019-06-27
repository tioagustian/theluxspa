<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Andhika Adhitia N">
		<meta name="generator" content="Powered by Aruna Development Project 4">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/4.3.1/css/bootstrap.min.css');?>">

		<link rel="stylesheet" href="<?= base_url('assets/plugins/select2.js/css/select2.min.css');?>">

		<link rel="stylesheet" href="<?= base_url('assets/plugins/gijgo/datepicker/css/gijgo.min.css');?>">
		<!--- Custom CSS --->
		<link rel="stylesheet" href="<?= base_url('assets/css/custom.css');?>">

		<!--- Roboto Font --->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

		<!--- Title --->
		<title>The Lux Spa - Invoice</title>
		<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-c0azpMyYUpTK-ckY"></script>
    	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

		<style type="text/css">

			.form-input {
			    box-shadow: 1px 0px 7px rgba(0,0,0,0.3);
			    padding-top: 10px;
			    border-radius: 3px;
			    padding-bottom: 10px;
			    background-color: white;
			}

			.form-container {
			    padding-left: 10em;
			    padding-right: 10em;
			    margin-bottom: 15px;
			    margin-top: 45px;
			}

			label {
				font-size: 10pt;
				color: grey;
				margin-bottom: 2px;
			}

			.o-list {
				border-bottom: 1px solid darkgrey;
				margin-bottom: 12px;
			}

			.o-list-item {
			    padding-left: 4px;
			}

			.o-total {
				margin-bottom: 12px;
			}

			.o-value {
				font-weight: 500;
    			font-size: x-large;
			}

			.i-header {
				border-bottom: 1px solid darkgrey;
				margin-bottom: 25px;
			}

			.i-footer {
				border-top: 1px solid darkgrey;
				margin-top: 25px;
				padding-top: 15px;
				padding-right: 15px;
				padding-left: 15px;
			}

			.f-container {
				display: flex;
				justify-content: center;
			}
			.f-content {
				text-align: center;
				margin: 25px;
			}
			.f-icon {
				text-align: center;
    			color: purple;
			}

			@media only screen and (max-width : 720px) {
				.form-container {
				    padding-left: 3em;
			    	padding-right: 3em;
				}
			}

			
		</style>
	</head>

	<body>
		<header class="navbar navbar-expand-lg navbar-light cs-navbar bg-light sticky-top">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="<?= base_url('assets/images/the_lux_spa.png');?>" style="width: 150px">
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto my-3 font-weight-bold">
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url(); ?>">Home</a>
						</li>
					</ul>
				</div>
			</div>
		</header>

		<div class="container-fluid form-container" style="">
			<div class="row form-input">
				<div class="container">
				    <div class="row">
				        <div class="col-md-12">
				        	<div class="f-container">
				        		<div class="f-content">
				        			<span class="f-icon">
				        				<i class="far fa-check-circle fa-7x"></i>
				        			</span>
				        			<h4 style="margin-top: 10px;">Transaksi berhasil!</h4>
				        			<h6>Menunggu verifikasi pebayaran</h6>
				        			<?php 
				        				if (!empty($order_id)) { ?>
				        			<span>Klik <a href="<?= base_url('booking/invoice/'.$order_id)?>">disini</a> untuk kembali ke halaman Invoice</span>
				        			<?php	}
				        			?>
				        		</div>
				        	</div>
				        </div>
				    </div>
				</div>
			</div>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('files/bower_components/popper.js/js/popper.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/4.3.1/js/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/fontawesome/5.7.2/js/all.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/parallax/parallax.min.js'); ?>"></script>

		<script>
		</script>
	</body>
</html>