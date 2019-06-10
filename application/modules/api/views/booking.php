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
				cursor: not-allowed;
			}

			.selected {
				background-color: #30FA8F;
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

		<div class="cs-cover-image d-flex justify-content-center align-items-center parallax-window" data-parallax="scroll" data-image-src="assets/images/cover-home.jpg">
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

		<div class="container p-5" id="about_us" style="margin-top: -5rem;margin-bottom: 5rem !important;padding-top: 10rem !important;padding-bottom: 7rem !important;">
			<form role="form" class="well form-horizontal">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
                            <label class="control-label">Layanan</label>
                            <div class="inputGroupContainer">
                               <div class="input-group">
                               		<div class="input-group-prepend">
	                                  	<span class="input-group-text" style="max-width: 100%;"><i class="fa fa-list"></i></span>
	                                </div>
                                  	<select class="selectpicker form-control" id="input_service" name="input_service">
                                     	<option>Pilih Layanan</option>
                                  	</select>
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
                                     	<option>Pilih Terapis</option>
                                  	</select>
                               </div>
                            </div>
                        </div>
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
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Jam</label>
							<div class="inputGroupContainer">
								<input type="hidden" name="input_jam" id="input_jam">
								<div class="inputGroupContainer">
									<div class="row ml-0 mr-0">
										<div class="col jamInput" data-value="9:00">
											<span>09:00</span>
										</div>
										<div class="col jamInput" data-value="9:30">
											<span>09:30</span>
										</div>
										<div class="col jamInput" data-value="10:00">
											<span>10:00</span>
										</div>
										<div class="col jamInput" data-value="10:30">
											<span>10:30</span>
										</div>
										<div class="col jamInput" data-value="11:00">
											<span>11:00</span>
										</div>
										<div class="col jamInput disabled" data-value="12:30">
											<span>12:30</span>
										</div>
										<div class="col jamInput" data-value="13:30">
											<span>13:30</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Kamar</label>
							<div class="inputGroupContainer">
								<input type="hidden" name="input_kamar" id="input_kamar">
								<div class="inputGroupContainer">
									<div class="row ml-0 mr-0">
										<div class="col kamarInput" data-value="1">
											<span>Kamar 1</span>
										</div>
										<div class="col kamarInput" data-value="2">
											<span>Kamar 2</span>
										</div>
										<div class="col kamarInput" data-value="3">
											<span>Kamar 3</span>
										</div>
										<div class="col kamarInput disabled" data-value="4">
											<span>Kamar 4</span>
										</div>
										<div class="col kamarInput" data-value="5">
											<span>Kamar 5</span>
										</div>
										<div class="col kamarInput" data-value="6">
											<span>Kamar 6</span>
										</div>
										<div class="col kamarInput" data-value="7">
											<span>Kamar 7</span>
										</div>
									</div>
								</div>
							</div>
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

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="assets/plugins/jquery/jquery.min.js"></script>
		<script src="assets/plugins/popper/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="assets/plugins/select2.js/js/select2.min.js"></script>
		<script src="assets/plugins/gijgo/datepicker/js/gijgo.min.js"></script>
		<script src="assets/plugins/fontawesome/5.7.2/js/all.min.js"></script>
		<script src="assets/plugins/parallax/parallax.min.js"></script>

		<script>


		function formatDate(today = new Date(), format = 'dd/mm/yyyy') {
			var dd = today.getDate();
			var mm = today.getMonth() + 1;

			var yyyy = today.getFullYear();
			if (dd < 10) {
			  dd = '0' + dd;
			} 
			if (mm < 10) {
			  mm = '0' + mm;
			}

			result = format.replace('dd', dd)
			result = result.replace('mm', mm)
			result = result.replace('yyyy', yyyy)

			return result
		}

		function disableDates(today = new Date()) {
			
		}

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

			$('#input_service').select2({
				placeholder: "Pilih Layanan",
				ajax: {
					url: "<?= base_url('services.json') ?>",
					dataType: "json"
				}
			})

			$('#input_service').on('select2:select', function (e) {
				data = e.params.data
				$('#input_terapis').removeAttr('disabled')
			})

			$('#input_terapis').select2({
				placeholder: "Pilih Layanan",
				ajax: {
					url: "<?= base_url('terapis.json') ?>",
					dataType: "json"
				}
			})

			$('#input_terapis').on('select2:select', function (e) {
				data = e.params.data
				$('#input_tanggal').removeAttr('disabled')
			})

			$('#input_tanggal').datepicker({
				uiLibrary: 'bootstrap',
				value: formatDate(),
				format: 'dd/mm/yyyy',
				minDate: formatDate()
			})

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
					$('#input_kamar').val(value)
				}
			})
		});
		</script>
	</body>
</html>