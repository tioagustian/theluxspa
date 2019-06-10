<html lang="en"><head>
    <title>The Lux Spa</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'); ?>"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'); ?>"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url('assets/images/favicon.ico');?>" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('files/bower_components/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?= base_url('files/assets/pages/waves/css/waves.min.css'); ?>" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('files/assets/icon/feather/css/feather.css'); ?>">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('files/assets/css/font-awesome-n.min.css'); ?>">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('files/assets/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('files/assets/css/pages.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/loading.css'); ?>">
</head>

<body themebg-pattern="theme1" class="  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" id="loginForm" url="<?= site_url('login');?>" method="post">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="text-center">
                            <img src="<?= base_url('assets/images/logo.webp');?>" alt="logo.webp" style="width: 150px;" />
                        </div>
                        <div class="auth-box card">
                            <div class="card-block" style="overflow: hidden;position: relative;">
                                <div id="info" style="background-color: rgba(255,255,255,0.8);position: absolute;height: 100%;width: 100%;z-index: 99;left: 0;top: 0; display: flex; justify-content: center; align-items: center; display: none;">
                                    <div class="text-center loader-block">
                                        <div class="success" id="success" style="display: none; padding: 10px;">
                                            <h3 class="text-success">Sukses!</h3>
                                            <p class="text-muted">Silahkan hubungi bagian IT untuk aktifasi akun</p>
                                        </div>
                                        <div class="preloader4">
                                            <div class="double-bounce1"></div>
                                            <div class="double-bounce2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Login</h3>
                                    </div>
                                </div>
                                <?= isset($failed) && !empty($failed) ? "<div class='alert alert-danger background-danger'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <i class='far fa-times-circle text-white'></i>
                                    </button>
                                    <p>{$failed}</p>
                                </div>" : ""; ?>
                                <?= $this->session->flashdata('success'); ?>
                                <div class="form-group form-primary">
                                    <input type="text" id="inputEmail" name="username" class="form-control" required="required" value="<?= set_value('username'); ?>">
                                    <span class="messages"><?= form_error('username', '<p class="text-danger">', '</p>'); ?></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" id="inputPassword" name="password" class="form-control" required="required" value="<?= set_value('password'); ?>">
                                    <span class="messages"><?= form_error('password', '<p class="text-danger">', '</p>'); ?></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" value="remember-me">
                                                <span class="cr"><i class="cr-icon fas fa-check txt-primary"></i></span>
                                                <span class="text-inverse">Ingat saya</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right float-right">
                                            <a href="#" class="text-right f-w-600"> Lupa Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" type="submit">Masuk</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left"><a href="<?= base_url('user/register');?>"><b>Daftar</b></a></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="<?= base_url('assets/images/logo.webp'); ?>" alt="small-logo.png" style="width: 50px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning messages -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?= base_url('files/assets/images/browser/chrome.png');?>" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?= base_url('files/assets/images/browser/firefox.png'); ?>" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?= base_url('files/assets/images/browser/opera.png'); ?>" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?= base_url('files/assets/images/browser/safari.png'); ?>" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?= base_url('files/assets/images/browser/ie.png'); ?>" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?= base_url('files/bower_components/jquery/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/bower_components/jquery-ui/js/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/bower_components/popper.js/js/popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/assets/js/pace.min.js'); ?>"></script>
    <!-- waves js -->
    <script src="<?= base_url('files/assets/pages/waves/js/waves.min.js'); ?>"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js'); ?>"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= base_url('files/bower_components/modernizr/js/modernizr.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/bower_components/modernizr/js/css-scrollbars.js'); ?>"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="<?= base_url('files/bower_components/i18next/js/i18next.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/bower_components/jquery-i18next/js/jquery-i18next.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('files/assets/js/common-pages.js'); ?>"></script>
</body>
</html>