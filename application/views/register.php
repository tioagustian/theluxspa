<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GLORIOUS DREAM</title>
    <!-- <link rel="icon" href="<?= base_url(); ?>assets/img/favicon.ico" type="image/png" sizes="16x16"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/third-party/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/loading.css">
    <script src="<?= base_url(); ?>assets/third-party/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/js/scrollSpy.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/third-party/anime/anime.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/js/app.js" type="text/javascript"></script>
</head>
<body>
    <div class="loader">
        <div class="loading ld ld-broadcast"></div>
    </div>
	<div class="background">
        <div class="container">
            <div class="register">
            	<div class="logo">
            		<img src="<?= base_url(); ?>assets/img/GRD_Logo.png">
            	</div>
                <div class="title">
                    <div>
                        <span class="light">PENDA</span><span class="heavy">FTARAN</span>
                    </div>
                </div>
                <form class="step-1">
                    <div class="progress1">
                        <div class="loading ld ld-broadcast"></div>
                    </div>
                  	<div class="form-group row">
                    	<label class="col-4 col-form-label" for="fullName">Nama Lengkap</label> 
                    	<div class="col-8">
                      		<input id="fullName" name="fullName" placeholder="Kakek Sugiyono ..." type="text" class="form-control" required="required">
                    	</div>
                  	</div>
                  	<div class="form-group row">
                    	<label for="phone" class="col-4 col-form-label">Nomor WhatsApp</label> 
                    	<div class="col-8">
                      		<input id="phone" name="phone" type="text" class="form-control">
                    	</div>
                  	</div>
                  	<div class="form-group row">
                    	<label for="bod" class="col-4 col-form-label">BOD</label> 
                    	<div class="col-8">
                      		<input id="bod" name="bod" placeholder="Tanggal Lahir" type="text" class="form-control" required="required">
                    	</div>
                  	</div>
                  	<div class="form-group row">
                    	<label for="province" class="col-4 col-form-label">Provinsi</label> 
                    	<div class="col-8">
                      		<select id="province" name="province" required="required" class="custom-select">
                        		<option value="fish">Fish</option>
                      		</select>
                    	</div>
                  	</div>
                  	<div class="form-group row">
                    	<label for="city" class="col-4 col-form-label">Kota</label> 
                    	<div class="col-8">
                      		<select id="city" name="city" class="custom-select" required="required">
                        		<option value="rabbit">Rabbit</option>
                      		</select>
                    	</div>
                  	</div>
                  	<div class="form-group row">
                    	<label for="nickname" class="col-4 col-form-label">Nickname</label> 
                    	<div class="col-8">
                      		<div class="input-group">
                        		<div class="input-group-prepend">
                          			<div class="input-group-text">GRD-</div>
                        		</div> 
                        	<input id="nickname" name="nickname" type="text" class="form-control" required="required">
                      		</div>
                    	</div>
                  	</div>
                  	<div class="form-group row">
                    	<label for="charId" class="col-4 col-form-label">Char ID</label> 
                    	<div class="col-8">
                      		<input id="charId" name="charId" placeholder="51627864" type="text" class="form-control" required="required">
                    	</div>
                  	</div> 
                  	<div class="form-group row">
                    	<div class="offset-4 col-8">
                      		<button name="submit" type="submit" class="btn btn-primary right">Submit</button>
                    	</div>
                  	</div>
                </form>
            </div>
        </div>
    </div>
</body>