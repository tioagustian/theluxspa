<html lang="en"><head>
    <title>Widigital Tri Buana</title>
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
                    <form class="md-float-material form-material" id="form" url="<?= base_url('daftar');?>">
                        <div class="text-center">
                            <img src="<?= base_url('assets/images/logo.webp');?>" alt="logo.webp" style="width: 150px;" />
                        </div>
                        <div class="auth-box card">
                            <div class="card-block" style="overflow: hidden;position: relative;">
                                <div id="info" style="background-color: rgba(255,255,255,0.8);position: absolute;height: 100%;width: 100%;z-index: 99;left: 0;top: 0; display: flex; justify-content: center; align-items: center; display: none;">
                                    <div class="text-center loader-block">
                                        <div class="preloader4">
                                            <div class="double-bounce1"></div>
                                            <div class="double-bounce2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Daftar</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="nip" class="form-control" required="">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">NIP</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="nik" class="form-control" required="required">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">NIK</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="npwp" class="form-control" required="">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">NPWP</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="nama_lengkap" class="form-control" required="required">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Nama Lengkap</label>
                                </div>
                                <div class="form-group form-primary">
                                    <select name="jenis_kelamin" class="form-control form-control-default fill" required="required">
                                        <option value="0">Jenis Kelamin</option>
                                        <option value="l">Laki-laki</option>
                                        <option value="p">Perempuan</option>
                                    </select>
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="date" name="tanggal_lahir" class="form-control" required="required" placeholder="Tanggal Lahir">
                                            <span class="messages"></span>
                                            <span class="form-bar"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="tempat_lahir" class="form-control" required="required">
                                            <span class="messages"></span>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tempat Lahir</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="alamat" class="form-control" required="required">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Alamat</label>
                                </div>
                                <div class="form-group form-primary">
                                    <select name="agama" class="form-control form-control-default fill" required="required">
                                        <option value="0">Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Kristen Katholik">Kristen Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <select name="status_perkawinan" class="form-control form-control-default fill" required="required">
                                        <option value="0">Status Perkawinan</option>
                                        <option value="l">Lajang</option>
                                        <option value="k">Kawin</option>
                                        <option value="c">Cerai</option>
                                    </select>
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="telepon" class="form-control" required="required">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Telepon</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required="required">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required="required">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Alamat Email</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="required">
                                    <span class="messages"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" id="submit">Daftar</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left"><a href="<?= base_url();?>"><b>Kembali</b></a></p>
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
    <script type="text/javascript" src="<?= base_url('files/assets/pages/form-validation/validate.js'); ?>"></script>
    <script type="text/javascript">

        var constraints = {
            nik: {
                presence: {
                    message: 'NIK tidak boleh kosong'
                },
                numericality: {
                    onlyNumeric: true,
                    message: 'NIK harus berupa angka'
                }
            },
            nip: {
                presence: {
                    allowEmpty: true
                },
                numericality: {
                    onlyNumeric: true,
                    message: 'NIP harus berupa angka'
                }
            },
            npwp: {
                presence: {
                    allowEmpty: true
                },
                numericality: {
                    onlyNumeric: true,
                    message: 'NPWP harus berupa angka'
                }
            },
            nama_lengkap: {
                presence: {
                    message: 'Nama lengkap tidak boleh kosong'
                },
                format: {
                    pattern: '^[a-zA-Z ]*$',
                    flags: 'i',
                    message: 'Nama lengkap hanya berupa huruf'
                }
            },
            jenis_kelamin: {
                presence: {
                    message: 'Jenis kelamin harus diisi'
                },
                inclusion: {
                    within: {'l':'Laki-laki','p':'Perempuan'},
                    message: '^Jenis kelamin harus diisi'
                }
            },
            tempat_lahir: {
                presence: {
                    message: 'Tempat lahir harus diisi'
                },
                format: {
                    pattern: '^[a-zA-Z ]*$',
                    flags: 'i',
                    message: 'Tempat lahir harus diisi'
                }
            },
            alamat: {
                presence: {
                    message: 'Alamat harus diisi'
                },
                format: {
                    pattern: '^.{1,50}$',
                    flags: 'i',
                    message: 'Alamat harus diisi'
                }
            },
            agama: {
                presence: {
                    message: 'Agama harus diisi'
                },
                inclusion: {
                    within: {
                        'Islam': 'Islam',
                        'Kristen Protestan': 'Kristen Protestan',
                        'Kristen Katholik': 'Kristen Katholik',
                        'Hindu': 'Hindu',
                        'Budha': 'Budha'
                    },
                    message: '^Agama harus diisi'
                }
            },
            status_perkawinan: {
                presence: {
                    message: 'Status perkawinan harus diisi'
                },
                inclusion: {
                    within: {'l':'Lajang','k':'Kawin', 'c':'Cerai'},
                    message: '^Status perkawinan harus diisi'
                }
            },
            telepon: {
                presence: {
                    message: 'Telepon tidak boleh kosong'
                },
                numericality: {
                    onlyNumeric: true,
                    message: 'Telepon harus berupa angka'
                }
            },
            username: {
                presence: {
                    message: 'Username tidak boleh kosong'
                },
                length: {
                    minimum: 3,
                    maximum: 20
                },
                format: {
                    pattern: '[a-z0-9]+',
                    message: 'Hanya boleh mengandung a-z and 0-9'
                }
          },
            email: {
                presence: {
                    message: 'Email harus diisi'
                },
                email: {
                    message: 'Email tidak valid'
                }
            },
            password: {
                presence: true,
                length: {
                    minimum: 5,
                    tooShort: '%{count} karakter lagi',
                    message: 'Password harus terdiri dari 5 karakter atau lebih'
                }
            },
            'confirm-password': {
                presence: {
                    message: 'Ulangi password'
                },
                equality: {
                    attribute: 'password',
                    message: 'Password tidak sama'
                }
            }
        }
        
        $(document).ready(function() {
            
            validate.extend(validate.validators.datetime, {

                parse: function(value, options) {

                    return +moment.utc(value);
                },
              
                format: function(value, options) {

                    var format = options.dateOnly ? "DD/MM/YYYY" : "DD/MM/YYYY";
                    return moment.utc(value).format(format);
                }
            });

            var input = document.querySelectorAll('input, select')

            var form = document.querySelector('form#form')

            var submit = document.getElementById('submit')

            submit.addEventListener('click', function (ev) {
                setSubmit()
            })

            form.addEventListener('submit', function (ev) {
                ev.preventDefault()
                submit()
            })

            input.forEach(function (el) {
                el.addEventListener('keyup', function (ev) {
                    var name = this.name
                    var value = this.value
                    handleInput(name, value, this)
                })
                el.addEventListener('blur', function (ev) {
                    var name = this.name
                    var value = this.value
                    var allowEmpty = (constraints[name] && typeof constraints[name].presence.allowEmpty != 'undefined')
                    var isSelect = (this.tagName == 'SELECT')
                    if (allowEmpty) {
                        handleInput(name, value, this, allowEmpty)
                        clearMessage(this)
                    } else {
                        handleInput(name, value, this, false, isSelect)
                    }
                })
            })

        });

        function handleInput(name, value, el, empty, select) {
            var errors = validate.single(value, constraints[name]) || false
            if (errors) {
                el.value = (!empty) ? value : (select) ? '0' : '' 
                showError(el, errors)
            } else {
                clearMessage(el)
            }
        }

        function showError(input, errors) {
            var formGroup = closestParent(input.parentNode, 'form-group')
            var messages = formGroup.querySelector('.messages')
            formGroup.classList.remove('has-success')

            formGroup.classList.add('has-error')

            var block = document.createElement("p");

            messages.innerHTML = ''

            block.classList.add('text-danger');
            block.classList.add('error');
            block.innerText = errors.join(', ');
            messages.appendChild(block);
            input.classList.add('input-danger')
        }

        function closestParent(child, className) {

            if (!child || child == document) {
                return null;
            }
            if (child.classList.contains(className)) {
                return child;
            } else {
                return closestParent(child.parentNode, className);
            }
        }

        function clearMessage(input) {
            var formGroup = closestParent(input.parentNode, 'form-group')
            var messages = formGroup.querySelector('.messages')
            messages.innerHTML = ''
        }

        function handleSubmit(form, el, empty, select, data) {
            var errors = validate(form, constraints) || false
            if (errors) {
                console.log(errors)
            } else {
                console.log(data)
            }
        }

        function setSubmit() {
            $('#info').fadeIn('500', function () {
                $(this).css('display', 'flex')
                var input = document.querySelectorAll('input, select')
                var data = {}
                var allowEmpty = {'nip': true,'npwp':true}
                for (var i = 0; i < input.length; i++) {
                    el = input[i]
                    el.setAttribute('disabled', 'disabled')
                    var name = el.name
                    var value = el.value
                    if (typeof allowEmpty[name] == 'undefined') {
                        if (isNull(value)) {
                            return cancel(name, value, input, el)
                        }
                    }
                    data[name] = value
                }
                send(data) 
            })
        }

        function isNull(value) {
            return (value == '' || value == '0')
        }

        function usernameCheck(input, el) {
            var name = el.name
            var value = el.value
            jQuery.ajax({
                
            })
        }

        function cancel(name, value, input, el, message) {
            if (!message) {
                'Ada kesalahan'
            }
            showError(el, [message])
            setTimeout(function (name, value, input) {
                $('#info').fadeOut('500', function () {
                    for (var i = 0; i < input.length; i++) {
                        el = input[i]
                        el.removeAttribute('disabled')
                    }    
                })
            }, 1000, name, value, input)
            return false
        }

        function send(data) {
            var url = document.querySelector('form#form').getAttribute('url')
            jQuery.ajax({
                url: url,
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success: function(result) {
                    if (result) {
                        console.log(result)
                    }
                    $('#info').fadeOut('500')
                },
                error: function () {
                    $('#info').fadeOut('500')
                }
            })
        }

    </script>
</body>
</html>