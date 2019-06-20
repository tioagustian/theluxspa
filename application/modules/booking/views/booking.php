<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Andhika Adhitia N">
		<meta name="generator" content="Powered by Aruna Development Project 4">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/plugins/bootstrap/4.3.1/css/bootstrap.min.css">

		<link rel="stylesheet" href="assets/plugins/select2.js/css/select2.min.css">

		<link rel="stylesheet" href="assets/plugins/gijgo/datepicker/css/gijgo.min.css">
		<!--- Custom CSS --->
		<link rel="stylesheet" href="assets/css/custom.css">

		<!--- Roboto Font --->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

		<!--- Title --->
		<title>The Lux Spa - Booking</title>

		<style type="text/css">
			.select2-container--default .select2-selection--single {
				border-top-left-radius: 0px;
				border-bottom-left-radius: 0px;
			}

			.select2-container .select2-selection--single {
				height: inherit;
			}

			.select2-container, .gj-datepicker, .gj-datepicker-bootstrap  {
				max-width: 400px;
			}

			.input-group {
				flex-wrap: nowrap;
			}

			.form-control {
				height: 30px;
				border-top-right-radius: 4px;
				border-bottom-right-radius: 4px;
				border-top-left-radius: 0px;
				border-bottom-left-radius: 0px;
				border: 1px solid rgb(170, 170, 170);
				/*max-width: 263px;*/
			}

			.input-group>.form-control:not(:last-child) {
			    border-top-right-radius: 4px;
			    border-bottom-right-radius: 4px;
			}

			.inputGroupContainer {
				/*max-width: 263px;*/
			}

			.jamInput {
				border: 1px solid rgb(170, 170, 170);
				border-radius: 4px;
				color: rgb(33, 37, 41);
			    display: flex;
			    justify-content: center;
			    max-width: 60px;
			    padding: 2px;
			    margin-bottom: 3px;
			    margin-right: 3px;
			    cursor: pointer;
			}

			.kamarInput {
				border: 1px solid rgb(170, 170, 170);
				border-radius: 4px;
				color: rgb(33, 37, 41);
			    display: flex;
			    justify-content: center;
			    min-width: 100px;
			    max-width: 100px;
			    padding: 5px;
			    margin-right: 3px;
			    margin-bottom: 3px;
			    cursor: pointer;
			    text-align: center;
			}

			.disabled {
				background-color: rgb(233,236,239);
				cursor: not-allowed !important;
				pointer-events: none !important;
			}

			.selected {
				background-color: lightgreen;
			}

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
			}

			.promo {

			}

			.next-btn {
				cursor: pointer;
			}

			label {
				font-size: 10pt;
				color: grey;
			}

			.o-list {
				border-bottom: 1px solid darkgrey;
				margin-bottom: 8px;
			}

			.o-list-item {
			    padding-left: 4px;
			}

			.o-total {
				margin-top: 8px;
			}

			.o-value {
				font-weight: 500;
    			font-size: x-large;
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
					<img src="assets/images/the_lux_spa.jpg" style="width: 150px">
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto my-3 font-weight-bold">
						<li class="nav-item">
							<a class="nav-link" href="#about_us">Tentang Kami</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#service">Layanan</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#why_us">Mengapa Kami</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('booking') ?>">Booking</a>
						</li>
					</ul>
				</div>
			</div>
		</header>

		<div class="container-fluid promo">
			<div class="cs-cover-image-overlay d-flex justify-content-center align-items-center w-100 h-100">
				<div class="container">
					<div class="row text-white text-center">
						<div class="col-md-12">
							<h1 class="mb-3">
								The Lux Spa & Massage
							</h1>

							<h4 class="font-weight-normal">
								Menyediakan treatment yang profesional dengan memberikan kualitas yang terbaik dalam segala aspek massage & spa.
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid form-container" style="">
			<form role="form" class="well form-horizontal" id="order_form">
				<div class="row form-input">
					<div class="col-md-6">
						<div class="form-group">
                            <label class="control-label">Layanan</label>
                            <div class="inputGroupContainer">
                               <div class="input-group">
                               		<div class="input-group-prepend">
	                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-list"></i></span>
	                                </div>
                                  	<select class="selectpicker form-control" id="input_service" name="input_service">
                                  	</select>
                               </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Durasi</label>
                            <div class="inputGroupContainer">
                               <div class="input-group">
                               		<div class="input-group-prepend">
	                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-hourglass-half"></i></span>
	                                </div>
                                  	<select class="selectpicker form-control" id="input_durasi" name="input_durasi" disabled></select>
                               </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Terapis</label>
                            <div class="inputGroupContainer">
                               <div class="input-group">
                               		<div class="input-group-prepend">
	                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-user"></i></span>
	                                </div>
                                  	<select class="selectpicker form-control" id="input_terapis" name="input_terapis" disabled>
                                  	</select>
                               </div>
                            </div>
                        </div>
					</div>
					<div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal</label>
                            <div class="inputGroupContainer">
                               <div class="input-group">
                               		<div class="input-group-prepend">
	                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-calendar"></i></span>
	                                </div>
                                  	<input class="selectpicker form-control" id="input_tanggal" name="input_tanggal" disabled>
                               </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label">Jam</label>
                            <div class="inputGroupContainer">
                               <div class="input-group">
                               		<div class="input-group-prepend">
	                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-clock"></i></span>
	                                </div>
                                  	<select class="selectpicker form-control" id="input_jam" name="input_jam" disabled>
                                  	</select>
                               </div>
                            </div>
                        </div>
						<div class="form-group">
							<label class="control-label">Kamar</label>
							<div class="inputGroupContainer">
								<input type="hidden" name="input_kamar" id="input_kamar">
								<div class="inputGroupContainer">
									<div class="row ml-0 mr-0">
										<?php foreach ($rooms as $room) { ?>
										<div class="col kamarInput disabled" id="kamar_<?= $room['id'] ?>" data-value="<?= $room['id'] ?>">
											<span><?= $room['name'] ?></span>
										</div>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="btn btn-primary next-btn float-right disabled" id="nextBtn" data-toggle="modal" data-target="nextForm" >Selanjutnya</div>
						</div>
					</div>
				</div>
			</form>
		</div>

		<div class="bg-white py-5 text-dark cs-footer">
			<div class="container">

				<div class="row">
					<div class="col-md-4 mb-5 mb-xl-0">
						<h3>The Lux Spa & Massage</h3>
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
						The Lux Spa & Massage &copy; 2019. All rights reserved.
					</div>

					<div class="col-md-6 text-center text-md-right">
						Made with <i class="fas fa-heart fa-lg ml-1 mr-1"></i> & <i class="fas fa-coffee fa-lg ml-1 mr-1"></i> in Jakarta, Indonesia.
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="nextForm" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
		  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        	<h5 class="modal-title" id="title">Konfirmasi</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
			      	</div>
			      	<div class="modal-body">
			        	<div class="container">
			        		<div class="row">
			        			<div class="col-md-6">
			        				<h5>Rincian</h5>
			        				<div class="form-group">
			                            <label class="control-label">Name</label>
			                            <div class="inputGroupContainer">
			                               <div class="input-group">
			                               		<div class="input-group-prepend">
				                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-user"></i></span>
				                                </div>
			                                  	<input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap">
			                               </div>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="control-label">Nomor Handphone</label>
			                            <div class="inputGroupContainer">
			                               <div class="input-group">
			                               		<div class="input-group-prepend">
				                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-phone"></i></span>
				                                </div>
			                                  	<input type="text" name="phone" class="form-control" id="phone" placeholder="Nomor Handphone">
			                               </div>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="control-label">Email</label>
			                            <div class="inputGroupContainer">
			                               <div class="input-group">
			                               		<div class="input-group-prepend">
				                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-at"></i></span>
				                                </div>
			                                  	<input type="email" name="phone" class="form-control" id="email" placeholder="Email">
			                               </div>
			                            </div>
			                        </div>
			        			</div>
			        			<div class="col-md-6">
			        				<h5>Rincian Pesanan</h5>
			        				<div class="row">
			        					<div class="col-6">
			        						<div class="o-list">
					        					<label class="control-label">Layanan</label>
					        					<div class="o-list-item" id="o_service">A</div>
					        				</div>
					        				<div class="o-list">
					        					<label class="control-label">Terapis</label>
					        					<div class="o-list-item" id="o_terapis">B</div>
					        				</div>
					        				<div class="o-list">
					        					<label class="control-label">Tanggal</label>
					        					<div class="o-list-item" id="o_tanggal">A</div>
					        				</div>
			        					</div>
			        					<div class="col-6">
			        						<div class="o-list">
					        					<label class="control-label">Jam</label>
					        					<div class="o-list-item" id="o_jam">B</div>
					        				</div>
					        				<div class="o-list">
					        					<label class="control-label">Durasi</label>
					        					<div class="o-list-item" id="o_durasi">A</div>
					        				</div>
					        				<div class="o-list">
					        					<label class="control-label">Kamar</label>
					        					<div class="o-list-item" id="o_kamar">B</div>
					        				</div>
			        					</div>
			        				</div>
			        				<div class="o-total float-right">
			        					<label>Total:</label>
			        					<div class="o-value" id="o_value">Rp. 0</div>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
			        	<button type="button" class="btn btn-primary" onclick="checkOut();">Checkout</button>
			      	</div>
		    	</div>
		  	</div>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="assets/plugins/jquery/jquery.min.js"></script>
		<script src="files/bower_components/popper.js/js/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="assets/plugins/select2.js/js/select2.min.js"></script>
		<script src="assets/plugins/gijgo/datepicker/js/gijgo.min.js"></script>
		<script src="assets/plugins/fontawesome/5.7.2/js/all.min.js"></script>
		<script src="assets/plugins/parallax/parallax.min.js"></script>

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

		$(document).ready(function() 
		{
			if (window.pageYOffset != 0)
			{
				$(".cs-navbar").addClass("cs-navbar-shadow");
			}

			$("#nextBtn").on('click', function (e) {
				getTotal($('#order_form').serialize())
			})

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

			//Service form logic

			$('#input_service').select2({
				placeholder: "Pilih Layanan",
				ajax: {
					url: "<?= base_url('api/getAvailableServices') ?>",
					dataType: "json"
				}
			})

			$('#input_service').on('select2:open', function (e) {
				$('#input_durasi').val(null).trigger('change')
				$('#input_terapis').val(null).trigger('change')
				disableForm([
					'#input_durasi',
					'#input_terapis',
					'#input_tanggal',
					'#input_jam',
					'#input_kamar',
					'.kamarInput',
					'.next-btn'
				])
			})

			$('#input_service').on('select2:select', function (e) {
				data = e.params.data
				enableForm([
					'#input_durasi'
				])
				getServiceDuration(data.id)
				getTherapis(data.id)
			})

			// End service form logic

			//Duration service form logic

			$('#input_durasi').select2({
				placeholder: "Pilih Durasi"
			})

			$('#input_durasi').on('select2:select', function (e) {
				data = e.params.data
				enableForm([
					'#input_terapis'
				])
			})

			function getServiceDuration(service_id) {
				$('#input_durasi').select2({
					placeholder: "Pilih Durasi",
					ajax: {
						url: "<?= base_url('api/getAvailableServices') ?>/" + service_id + "/duration",
						dataType: "json",
						processResults: function (data) {
							return {
								results: data.results
							}
						}
					}
				})
			}

			//End duration service form logic

			// Therapis form logic

			$('#input_terapis').select2({
				placeholder: "Pilih Therapis"
			})

			$('#input_terapis').on('select2:open', function (e) {
				disableForm([
					'#input_tanggal',
					'#input_jam',
					'#input_kamar',
					'.kamarInput',
					'.next-btn'
				])
			})

			$('#input_terapis').on('select2:select', function (e) {
				data = e.params.data
				enableForm([
					'#input_tanggal'
				])
				$.ajax({
					url: "<?= base_url('api/getDisabledDate?therapis_id=') ?>" + data.id,
					dataType: "json",
					method: "GET",
					data: {
						service_id: $('#input_service').val(),
						duration: $('#input_durasi').val(),
						terapis_id: $('#input_terapis').val()
					},
					success: function (data) {
						$date.destroy()
						getDisabledDate(data)
					}

				})
			})

			function getTherapis(service_id) {
				$('#input_terapis').select2({
					placeholder: "Pilih Therapis",
					ajax: {
						url: "<?= base_url('api/getAvailableTherapis') ?>?service_id=" + service_id,
						dataType: "json",
						processResults: function (data) {
							return {
								results: data.results
							}
						}
					}
				})
			}

			//End therapis form logic

			//Date form logic

			var $date = $('#input_tanggal').datepicker({
				uiLibrary: 'bootstrap',
				showOtherMonths: true,
				value: formatDate(),
				format: 'dd/mm/yyyy',
				minDate: formatDate()
			})

			function getDisabledDate(data) {
				$('#input_tanggal').datepicker({
					uiLibrary: 'bootstrap',
					showOtherMonths: true,
					value: formatDate(),
					format: 'dd-mmm-yyyy',
					minDate: formatDate(),
					disableDates: data,
					open: function (e) {
						disableForm([
							'#input_jam',
							'#input_kamar',
							'.kamarInput',
							'.next-btn'
						])
					},
					close: function (e) {
						enableForm([
							'#input_jam'
						])
					},
					select: function (e) {
						enableForm([
							'#input_jam'
						])
						getAvailableTime()
					}
				})
			}

			//End date form logic

			//Time form logic

			$('#input_jam').select2({
				placeholder: "Pilih Jam"
			})

			function getAvailableTime() {
				service = $('#input_service').val()
				duration = $('#input_durasi').val()
				therapis = $('#input_terapis').val()
				date = $('#input_tanggal').val()
				url = "<?= base_url('api/getAvailableTime') ?>" + "?service_id=" + service + "&duration=" + duration + "&therapis_id=" + therapis + "&date=" + date
				$('#input_jam').select2({
					placeholder: "Pilih Jam Booking",
					ajax: {
						url: url,
						dataType: "json",
						processResults: function (data) {
							return data
						}
					}
				})
			}

			$('#input_jam').on('select2:open', function (e) {
				disableForm([
					'#input_kamar',
					'.kamarInput',
					'.next-btn'
				])
			})

			$('#input_jam').on('select2:select', function (e) {
				data = e.params.data
				service = $('#input_service').val()
				duration = $('#input_durasi').val()
				therapis = $('#input_terapis').val()
				date = $('#input_tanggal').val()
				$.ajax({
					url: "<?= base_url('api/getAvailableRooms'); ?>",
					dataType: 'json',
					method: 'GET',
					data: {
						service_id: service,
						duration: duration,
						therapis_id: therapis,
						date: date,
						time: data.id
					},
					success: function (result) {
						showAvailableRooms(result.results)
					}
				})
			})

			//End time form logic

			//Rooms form logic

			function showAvailableRooms(datas) {
				datas.forEach(function (data) {
					if ($.find('#kamar_' + data.id)) {
						$('#kamar_' + data.id).removeClass('selected disabled')
					}
				})
			}

			//End rooms form logic

			$('.jamInput').on('click', function () {
				var selection = $('.jamInput')
				var value = $(this).data('value')
				for (var i = 0; i < selection.length; i++) {
					if ($(selection[i]).hasClass('selected')) {
						$(selection[i]).removeClass('selected')
					}
				}
				if (!$(this).hasClass('disabled')) {
					$(this).addClass('selected')
					$('#input_jam').val(value)
				}
			})

			$('.kamarInput').on('click', function () {
				var selection = $('.kamarInput')
				var value = $(this).data('value')
				for (var i = 0; i < selection.length; i++) {
					if ($(selection[i]).hasClass('selected')) {
						$(selection[i]).removeClass('selected')
					}
				}
				if (!$(this).hasClass('disabled')) {
					$(this).addClass('selected')
					$('#input_kamar').removeAttr('disabled')
					$('#input_kamar').val(value)
				}
				enableForm([
					'.next-btn'
				])
			})

			function getTotal(form) {
				$.ajax({
					url: "<?= base_url('api/getTotalValue');?>",
					method: "GET",
					data: form,
					success: function (data) {
						$('#o_service').text(data.service_name)
						$('#o_terapis').text(data.therapis_name)
						$('#o_kamar').text(data.room_name)
						$('#o_tanggal').text(data.date)
						$('#o_jam').text(data.time)
						$('#o_durasi').text(data.duration + ' menit')
						$('#o_value').text('Rp. ' + data.total_price)
						$('#nextForm').modal('show')
					}
				})
			}

			function checkOut(argument) {
				console.log('checkout')
			}

			function enableForm(targets) {
				targets.forEach(function (el) {
					if ($(el).length == 1 && el != '.next-btn'){
						$(el).removeAttr('disabled')
					} else {
						$(el).removeClass('selected')
						$(el).removeClass('disabled')
					}
				})
			}

			function disableForm(targets) {
				targets.forEach(function (el) {
					if ($(el).length == 1 && el != '.next-btn'){
						$(el).attr('disabled', true)
					} else {
						$(el).removeClass('selected')
						$(el).addClass('disabled')
					}
				})
			}
		});
		</script>
	</body>
</html>