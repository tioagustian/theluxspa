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
			    padding-top: 10px;
			    border: 1px solid black;
			    padding-bottom: 10px;
			    background-color: white;
			}

			.form-container {
			    padding-left: 2em;
			    padding-right: 2em;
			    margin-bottom: 15px;
			    margin-top: 5px;
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
				    padding-left: 2em;
			    	padding-right: 2em;
				}
			}

			.container {

			}

			
		</style>
	</head>

	<body>
		<div class="container-fluid form-container" style="">
			<div class="row mb-3 mt-2">
				<div class="col-md-4">
					<img src="<?= base_url('assets/images/the_lux_spa.png')?>" style="width: 200px">
				</div>
			</div>
			<div class="row form-input" id="invoice">
				<div class="col-md-12 i-header">
					<div class="row">
						<div class="col-6">
							<h4>Invoice <small><?= $invoice_id; ?></small></h4>
						</div>
						<div class="col-6">
							<?php switch ($status) {
								case 'pending':
							?>
							<strong class="i-date float-right" style="color: orange">Pending</strong>
							<?php break;
								case 'settlement':
							?>
							<strong class="i-date float-right" style="color: green">Lunas</strong>
							<?php break;
								case 'canceled':
							?>
							<strong class="i-date float-right" style="color: red">Dibatalkan</strong>
							<?php break;
								default :
							?>
							<strong class="i-date float-right" style="color: blue">Belum dibayar</strong>
							<?php break; 
								}
							?>
						</div>
					</div>
				</div>
				<div class="container">
				    <div class="row mb-3">
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
				    				<div class="row">
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
				    					<div class="col-md-6" style="display: flex;justify-content: center;">
				    						<img src="<?= base_url('booking/sobci/'.$invoice_id)?>" style="height: 62px;" />
				    					</div>
				    				</div>
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
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('files/bower_components/popper.js/js/popper.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/4.3.1/js/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/fontawesome/5.7.2/js/all.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/parallax/parallax.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/html2canvas/html2canvas.min.js'); ?>"></script>
		<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
		<script type="text/javascript">
			function render() {
				console.log('start')
				html2canvas(document.body).then(function(canvas) {
				    var img = canvas.toDataURL("image/png");
			        var doc = new jsPDF({
					  	orientation: 'landscape',
					  	unit: 'px',
					  	format: [1024, 497]
					});
			        doc.addImage(img, 'JPEG', 0, 0);
			        window.location = doc.output('bloburl');
				});
			}

			$(document).ready(function () {
				render()
			})
		</script>
	</body>
</html>