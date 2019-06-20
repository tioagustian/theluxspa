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

		<!--- Custom CSS --->
		<link rel="stylesheet" href="assets/css/custom.css">

		<!--- Roboto Font --->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

		<!--- Title --->
		<title>The Lux Spa</title>
	</head>

	<body>
		<header class="navbar navbar-expand-lg navbar-light cs-navbar bg-light sticky-top">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="assets/images/the_lux_spa.png" style="width: 150px">
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
			<div class="row">
				<div class="col-md-6">
					<div class="mb-2">
						<h3>Tentang The Lux Spa & Massage</h3>
					</div>

					<hr class="mt-0 mr-auto text-center position-relative border-0" style="margin-left: 0;margin-bottom: 40px;height: 3px;width: 70px;background: #6aaf08;">

					<p style="font-size: 15px;line-height: 1.6">
						The Lux Spa selalu menawarkan yang terbaik untuk kepuasan pelanggan. Dengan memadukan aliran massage Thailand dan pijat tradisional Indonesia, kami telah menggabungkan sensasi pijat yang sangat memuaskan.
					</p>

					<p style="font-size: 15px;line-height: 1.6">
						 Kami percaya bahwa treatment kami tidak hanya akan menghilangkan penat dan pegal, tetapi juga membuat pelanggan merasa fresh dan bugar kembali. Kami yakin, The Lux Spa akan menjadi solusi yang terbaik untuk kebutuhan menjaga kebugaran dan kesehatan tubuh.
					</p>

					<a href="#service" class="btn btn-lg rounded text-white mt-4 mb-4 mb-md-0" style="background: #6aaf08">Lihat Semua Layanan</a>
				</div>

				<div class="col-md-6 d-flex align-items-center">
					<div class="row">
						<div class="col-md-6 mb-4 mb-md-0">
							<img src="assets/images/massage-1.jpg" class="img-fluid rounded">
						</div>

						<div class="col-md-6">
							<img src="assets/images/massage-2.jpg" class="img-fluid rounded">
						</div>

						<div class="col-md-6 offset-md-3 mt-4">
							<img src="assets/images/massage-3.jpg" class="img-fluid rounded">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div style="z-index: 1;background: #6aaf08">
			<div class="d-inline-block" id="service" style="margin-top: -4rem;padding-top: 5rem !important"></div>

			<div class="container text-white p-5">
				<div class="mb-4 text-center">
					<h3>Layanan Kami</h3>
				</div>

				<hr class="mt-0 mr-auto text-center position-relative border-0" style="margin-bottom: 4rem;height: 3px;width: 70px;background: rgba(255,255,255,0.6);">

				<div class="row">
					<!--- First --->
					<div class="col-md-3 text-center mb-5">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">1</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">The Lux Refleksi</h5>
								<p class="mb-0">Refleksi ala The Lux yang menyegarkan tubuh.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 text-center mb-5">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">2</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Luxury Aromatherapy Refleksi</h5>
								<p class="mb-0">Refleksi dengan aroma therapy yang wangi dan menyejukkan pikiran.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 text-center mb-5">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">3</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Head Massage</h5>
								<p class="mb-0">Treatment massage untuk kepala. Cocok untuk meringankan stress.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 text-center mb-5">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">4</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Face Massage</h5>
								<p class="mb-0">Massage wajah untuk membuat wajah terasa bugar.</p>
							</div>
						</div>
					</div>

					<!--- Second --->
					<div class="col-md-3 text-center mb-5">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">5</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Lux Body Massage</h5>
								<p class="mb-0">Pijat badan yang nikmat untuk menghilangkan pegal - pegal.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 text-center mb-5">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">6</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Body Scrubs</h5>
								<p class="mb-0">Massage yang dipadu dengan lulur alami ala The Lux.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 text-center mb-5">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">7</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Back Therapy</h5>
								<p class="mb-0">Pijat punggung yang sangat cocok dinikmati ketika badan terasa berat.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 text-center mb-5">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">8</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Spa Massage</h5>
								<p class="mb-0">Pijat dan spa yang refreshing.</p>
							</div>
						</div>
					</div>

					<!--- Third --->
					<div class="col-md-3 text-center mb-5 mb-md-0 offset-md-2">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">9</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Ear Candling</h5>
								<p class="mb-0">Membersihkan telinga dengan “Ear Candle” dari Tiongkok.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 text-center mb-5 mb-md-0">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">10</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Cupping</h5>
								<p class="mb-0">Treatment cupping tanpa jarum. Sangat cocok untuk mengobati titik pegal.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 text-center">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<div class="font-weight-bold rounded-circle cs-bg-blue-spa text-white text-center shadow" style="font-size: 4.5rem;width: 7rem">11</div>
							</div>

							<div class="col-md-12">
								<h5 class="my-3">Coin Massage</h5>
								<p class="mb-0">Kerokan ala Indonesia yang digabungkan dengan pijat Thailand.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-light">
			<div class="d-inline-block" id="why_us" style="margin-top: -4rem;padding-top: 5rem !important"></div>

			<div class="container p-5">
				<div class="mb-4 text-center">
					<h3>Kenapa Kami ?</h3>
				</div>

				<hr class="mt-0 mr-auto text-center position-relative border-0" style="margin-bottom: 4rem;height: 3px;width: 70px;background: #6aaf08;">

				<div class="row">
					<div class="col-md-4">
						<img src="assets/images/why_the_lux_1.jpg" class="img-fluid rounded">

						<p class="mt-3" style="font-size: 15px;line-height: 1.6">Therapist - therapist kami telah diberi pelatihan menyeluruh sebelum diperbolehkan untuk melayani pelanggan.</p>
					</div>

					<div class="col-md-4">
						<img src="assets/images/why_the_lux_2.jpg" class="img-fluid rounded">

						<p class="mt-3" style="font-size: 15px;line-height: 1.6">Interior yang ditata sedemikian rupa akan membuat anda nyaman dan menikmati servis yang kami berikan.</p>
					</div>

					<div class="col-md-4">
						<img src="assets/images/why_the_lux_3.jpg" class="img-fluid rounded">

						<p class="mt-3" style="font-size: 15px;line-height: 1.6">Kami selalu memastikan semua komponen keperluan massage dalam keadaan sempurna (Minyak, facial, lotion tidak kadaluarsa)</p>
					</div>
				</div>
			</div>
		</div>

		<div class="cs-bg-blue-spa text-white">
			<div class="container p-5">
				<div class="row">
					<div class="col-md-4 text-center">
						<h1>VISI</h1>
					</div>

					<div class="col-md-6 text-left mb-5">
						<p class="lead mb-0">Menyediakan treatment yang profesional dengan memberikan kualitas yang terbaik dalam segala aspek massage & spa.</p>
					</div>

					<div class="col-md-4 text-center">
						<h1>MISI</h1>
					</div>

					<div class="col-md-6 text-left">
						<p class="lead mb-0">Menjadi layanan massage dan spa yang terbaik di Indonesia dan ikut serta dalam menjaga kesegaran dan kebugaran pelanggan yang datang.</p>
					</div>
				</div>
			</div>
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
		<script src="assets/plugins/fontawesome/5.7.2/js/all.min.js"></script>
		<script src="assets/plugins/parallax/parallax.min.js"></script>

		<script>
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