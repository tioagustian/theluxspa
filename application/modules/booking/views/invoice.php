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
				<div class="col-md-12 i-footer">
					<div class="row">
						<?php 
							switch ($status) {
								case 'unpaid':
						?>
						<div class="col-6">
							<div>
								Bayar sebelum <?= $expired_in ?> <small id="countdown" style="color: darkgrey;">(06:00:00)</small>
							</div>
						</div>
						<div class="col-6">
							<form id="payment-form" method="post" action="<?= base_url()?>payment/snap/finish">
								<input type="hidden" name="result_type" id="result-type" value="">
      							<input type="hidden" name="result_data" id="result-data" value="">
								<input type="submit" name="pay" class="btn btn-primary float-right" id="pay" value="Bayar" />
							</form>
						</div>
						<?php break;
							case 'pending': ?>
						<div class="col-12">
							<span>
								Menunggu hasil pembayaran
							</span>
						</div>
						<?php	break;
							default: ?>
							<div class="col-12">
								<button class="btn btn-outline-dark float-right" id="pdf"><i class="far fa-file-pdf"></i> PDF</button>
							</div>
						<?php break;
						} ?>
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
			$('#pdf').on('click', function (e) {
				e.preventDefault()
				window.location.href = "<?= base_url('booking/invoice/'.$invoice_id.'/pdf') ?>"
			})
			<?php 

			switch ($status) {
				case 'unpaid': ?>

			var tnv__0x225a=['(EXPIRED)','ready','pageYOffset','.cs-navbar','addClass','cs-navbar-shadow','scroll','scrollTop','removeClass','#pay','click','preventDefault','attr','disabled','ajax','<?= base_url('payment/token/'.$invoice_id)?>','result-type','result-data','<?= base_url('payment/update/'.$invoice_id)?>','post','finish_redirect_url','pending','hide','return\x20(function()\x20','{}.constructor(\x22return\x20this\x22)(\x20)','console','debug','info','error','exception','trace','log','warn','<?=$expired_in?>','getTime','floor','getElementById','countdown','innerHTML','style','color:\x20red;'];(function(_0x390ef0,_0x1bbc01){var _0x1a6f76=function(_0x327ea6){while(--_0x327ea6){_0x390ef0['push'](_0x390ef0['shift']());}};_0x1a6f76(++_0x1bbc01);}(tnv__0x225a,0x1da));var tnv__0x3968=function(_0x12b843,_0x2ce7f3){_0x12b843=_0x12b843-0x0;var _0xde2480=tnv__0x225a[_0x12b843];return _0xde2480;};var _0xd95e52=function(){var _0xb9da6d=!![];return function(_0x22cb3d,_0x113048){var _0x1a8dbf=_0xb9da6d?function(){if(_0x113048){var _0x4ad8fe=_0x113048['apply'](_0x22cb3d,arguments);_0x113048=null;return _0x4ad8fe;}}:function(){};_0xb9da6d=![];return _0x1a8dbf;};}();var _0x5773e8=_0xd95e52(this,function(){var _0x3df76e=function(){};var _0x28fa26;try{var _0x24f9b3=Function(tnv__0x3968('0x0')+tnv__0x3968('0x1')+');');_0x28fa26=_0x24f9b3();}catch(_0x48c35b){_0x28fa26=window;}if(!_0x28fa26[tnv__0x3968('0x2')]){_0x28fa26[tnv__0x3968('0x2')]=function(_0x3df76e){var _0x5913e9={};_0x5913e9['log']=_0x3df76e;_0x5913e9['warn']=_0x3df76e;_0x5913e9[tnv__0x3968('0x3')]=_0x3df76e;_0x5913e9[tnv__0x3968('0x4')]=_0x3df76e;_0x5913e9[tnv__0x3968('0x5')]=_0x3df76e;_0x5913e9[tnv__0x3968('0x6')]=_0x3df76e;_0x5913e9[tnv__0x3968('0x7')]=_0x3df76e;return _0x5913e9;}(_0x3df76e);}else{_0x28fa26[tnv__0x3968('0x2')][tnv__0x3968('0x8')]=_0x3df76e;_0x28fa26['console'][tnv__0x3968('0x9')]=_0x3df76e;_0x28fa26[tnv__0x3968('0x2')][tnv__0x3968('0x3')]=_0x3df76e;_0x28fa26[tnv__0x3968('0x2')][tnv__0x3968('0x4')]=_0x3df76e;_0x28fa26[tnv__0x3968('0x2')][tnv__0x3968('0x5')]=_0x3df76e;_0x28fa26[tnv__0x3968('0x2')][tnv__0x3968('0x6')]=_0x3df76e;_0x28fa26[tnv__0x3968('0x2')][tnv__0x3968('0x7')]=_0x3df76e;}});_0x5773e8();var countdown=setInterval(function(){var _0x3db68a=new Date(tnv__0x3968('0xa'))[tnv__0x3968('0xb')]();var _0x28417e=new Date()[tnv__0x3968('0xb')]();var _0x5ab91d=_0x3db68a-_0x28417e;var _0x21442d=Math[tnv__0x3968('0xc')](_0x5ab91d/(0x3e8*0x3c*0x3c*0x18));var _0x2304b5=Math[tnv__0x3968('0xc')](_0x5ab91d%(0x3e8*0x3c*0x3c*0x18)/(0x3e8*0x3c*0x3c));if(_0x2304b5<0xa){_0x2304b5='0'+_0x2304b5;}var _0x4a077c=Math[tnv__0x3968('0xc')](_0x5ab91d%(0x3e8*0x3c*0x3c)/(0x3e8*0x3c));if(_0x4a077c<0xa){_0x4a077c='0'+_0x4a077c;}var _0x515681=Math['floor'](_0x5ab91d%(0x3e8*0x3c)/0x3e8);if(_0x515681<0xa){_0x515681='0'+_0x515681;}var _0x589636=Math[tnv__0x3968('0xc')](_0x5ab91d%(0x3e8*0x3c)/0xa)['toString']();var _0x337397=document[tnv__0x3968('0xd')](tnv__0x3968('0xe'));_0x337397[tnv__0x3968('0xf')]='('+_0x2304b5+':'+_0x4a077c+':'+_0x515681+':'+_0x589636['slice'](-0x2)+')';if(_0x5ab91d<0x0){e[tnv__0x3968('0x10')]=tnv__0x3968('0x11');_0x337397[tnv__0x3968('0xf')]=tnv__0x3968('0x12');}},0xa);$(document)[tnv__0x3968('0x13')](function(){if(window[tnv__0x3968('0x14')]!=0x0){$(tnv__0x3968('0x15'))[tnv__0x3968('0x16')](tnv__0x3968('0x17'));}$(window)[tnv__0x3968('0x18')](function(){if($(window)[tnv__0x3968('0x19')]()==0x0){$('.cs-navbar')[tnv__0x3968('0x1a')](tnv__0x3968('0x17'));}else{$(tnv__0x3968('0x15'))[tnv__0x3968('0x16')]('cs-navbar-shadow');}});$(tnv__0x3968('0x1b'))[tnv__0x3968('0x1c')](function(_0x3e3951){_0x3e3951[tnv__0x3968('0x1d')]();$(this)[tnv__0x3968('0x1e')](tnv__0x3968('0x1f'),'disabled');$[tnv__0x3968('0x20')]({'url':tnv__0x3968('0x21'),'cache':![],'success':function(_0x315d6c){var _0xcf41d2=document['getElementById'](tnv__0x3968('0x22'));var _0x458217=document['getElementById'](tnv__0x3968('0x23'));function _0x3b4fd8(_0x4aff35,_0x315d6c){$['ajax']({'url':tnv__0x3968('0x24'),'cache':![],'data':_0x315d6c,'method':tnv__0x3968('0x25'),'success':function(_0x53ada9){}});}snap['pay'](_0x315d6c,{'onSuccess':function(_0x196983){_0x3b4fd8('success',_0x196983);window['location']=_0x196983[tnv__0x3968('0x26')];},'onPending':function(_0x6c2dc8){_0x3b4fd8(tnv__0x3968('0x27'),_0x6c2dc8);window['location']=_0x6c2dc8['finish_redirect_url'];},'onError':function(_0x277a89){_0x3b4fd8(tnv__0x3968('0x5'),_0x277a89);}});},'error':function(_0x399840){snap[tnv__0x3968('0x28')]();}});});});
					
			<?php	break;
				
				default:
					# code...
					break;
			}

			?>
		<?= $script?>

		</script>
	</body>
</html>