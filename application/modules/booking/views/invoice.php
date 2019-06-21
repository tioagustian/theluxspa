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
				<div class="col-md-12 i-header">
					<div class="row">
						<div class="col-6">
							<h4>Invoice <small><?= $invoice_id; ?></small></h4>
						</div>
						<div class="col-6">
							<?php switch ($status) {
								case 'pending_payment':
							?>
							<strong class="i-date float-right" style="color: orange">Pending</strong>
							<?php break;
								case 'paid-off':
							?>
							<strong class="i-date float-right" style="color: green">Lunas</strong>
							<?php break;
								case 'cancel_order':
							?>
							<strong class="i-date float-right" style="color: red">EXPIRED</strong>
							<?php break;
								default :
							?>
							<strong class="i-date float-right" style="color: blue">REFUND</strong>
							<?php break; 
								}
							?>
						</div>
					</div>
				</div>
				<div class="container">
				    <div class="row">
				        <div class="col-md-12">
				    		<div class="row">
				    			<div class="col-md-6">
				    				<address>
				    				<strong>Kepada:</strong><br>
				    					<?= $name?><br>
				    					<?= $phone?><br>
				    					<?= $email?><br>
				    				</address>
				    			</div>
				    			<div class="col-md-6">
				    				<address>
				    					<div class="mb-2">
				    						<strong>Tanggal pemesanan:</strong><br>
				    						<?= $date_created ?>
				    					</div>
				        				<div class="mb-2">
				    						<strong>Tanggal booking:</strong><br>
				    						<?= $date . ', ' . $time; ?>
				    					</div>
				    				</address>
				    			</div>
				    		</div>
				    	</div>
				    </div>
				    
				    <div class="row">
				    	<div class="col-md-12">
				    		<div class="panel panel-default">
				    			<div class="panel-heading">
				    				<h5 class="panel-title"><strong>Rincian</strong></h5>
				    			</div>
				    			<div class="panel-body">
				    				<div class="table-responsive">
				    					<table class="table table-condensed">
				    						<thead>
				                                <tr>
				        							<td><strong>Layanan</strong></td>
				        							<td><strong>Therapis</strong></td>
				        							<td class="text-center"><strong>Harga</strong></td>
				        							<td class="text-center"><strong>Durasi</strong></td>
				        							<td class="text-right"><strong>Total</strong></td>
				                                </tr>
				    						</thead>
				    						<tbody>
				    							<!-- Item loop -->
				    							<tr>
				    								<td><?= $service; ?></td>
				        							<td><?= $therapis; ?></td>
				    								<td class="text-center"><?= $price?></td>
				    								<td class="text-center"><?= $duration?></td>
				    								<td class="text-right">Rp. <?= $total?></td>
				    							</tr>
				    							<!-- End item loop -->
				    							<tr>
				    								<td class="thick-line"></td>
				    								<td class="thick-line"></td>
				    								<td class="thick-line"></td>
				    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
				    								<td class="thick-line text-right">Rp. <?= $total?></td>
				    							</tr>
				    							<!-- <tr>
				    								<td class="no-line"></td>
				    								<td class="no-line"></td>
				    								<td class="no-line text-center"><strong>Pajak</strong></td>
				    								<td class="no-line text-right">0</td>
				    							</tr> -->
				    							<tr>
				    								<td class="no-line"></td>
				    								<td class="no-line"></td>
				    								<td class="thick-line"></td>
				    								<td class="no-line text-center"><strong>Total</strong></td>
				    								<td class="no-line text-right">Rp. <?= $total?></td>
				    							</tr>
				    						</tbody>
				    					</table>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
				    </div>
				</div>
				<div class="col-md-12 i-footer">
					<div class="row">
						<div class="col-6">
							<div>
								Bayar sebelum <?= $expired_in ?> <small id="countdown" style="color: darkgrey;">(06:00:00)</small>
							</div>
						</div>
						<div class="col-6">
							<div class="btn btn-primary float-right">Bayar</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-white py-5 text-dark cs-footer">
			<div class="container">

				<div class="row">
					<div class="col-md-4 mb-5 mb-xl-0">
						<h3>The Lux Facial & Massage</h3>
					</div>

					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 mb-5 mb-xl-0 offset-md-6">
								<h5>Address</h5>
							
								<div class="list-group list-group-flush">
									<a href="#!" target="_blank" class="list-group-item text-dark"><i class="fas fa-map-marker-alt fa-lg mr-2"></i> Jl. Mampang Prapatan XV no 12 B. Pancoran, Jakarta Selatan</a>
									<a href="#!" target="_blank" class="list-group-item text-dark"><i class="fas fa-phone fa-lg mr-2"></i> 08111699994</a>
								</div>
							</div>		  
						</div>
					</div>
				</div>

				<div class="row align-items-center justify-content-md-between mt-5 pt-5">
					<div class="col-md-6 text-center text-md-left mb-3 mb-xl-0">
						The Lux Facial & Massage &copy; 2019. All rights reserved.
					</div>

					<div class="col-md-6 text-center text-md-right">
						Made with <i class="fas fa-heart fa-lg ml-1 mr-1"></i> & <i class="fas fa-coffee fa-lg ml-1 mr-1"></i> in Jakarta, Indonesia.
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


		function formatDate(today = new Date(), format = 'dd-mmm-yyyy') {
			var tomorrow = new Date(today)
			tomorrow.setDate(today.getDate()+1)
			var dd = tomorrow.getDate()
			var mmm = today.getMonth()
			var yyyy = today.getFullYear()
			var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			if (dd < 10) {
			  dd = '0' + dd
			}

			result = format.replace('dd', dd)
			result = result.replace('mmm', month[mmm])
			result = result.replace('yyyy', yyyy)

			return result
		}

		var countdown = setInterval(function () {
			var deadline = new Date('<?= $expired_in ?>').getTime()
			var now = new Date().getTime();
			var t = deadline - now; 
			var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
			var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
			var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
			var seconds = Math.floor((t % (1000 * 60)) / 1000);
			var el = document.getElementById('countdown')
			el.innerHTML = '(' + hours + ':' + minutes + ':' + seconds + ')'
			if (t < 0) {
				e.style = 'color: red;'
				el.innerHTML = '(EXPIRED)'
			}
		}, 1000)

		$(document).ready(function() 
		{
			if (window.pageYOffset != 0)
			{
				$(".cs-navbar").addClass("cs-navbar-shadow");
			}

			$(window).scroll(function() 
			{
				if ($(window).scrollTop() == 0) 
				{
					$(".cs-navbar").removeClass("cs-navbar-shadow");
				}
				else 
				{
					$(".cs-navbar").addClass("cs-navbar-shadow");
				}
			});
		});
		</script>
	</body>
</html>