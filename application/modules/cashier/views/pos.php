<style type="text/css">
    .select2-container--default .select2-selection--single {
        height: auto!important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        background-color: #fff;
    }

    .time-box {
        text-align: center;
        padding: 3px;
        border: 1px solid grey;
        margin-left: 15px;
        border-radius: 4px
    }

</style>
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h5>Layanan</h5>
                <span></span>
            </div>
            <div class="card-block">
                <form class="form-primary">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Layanan
                                </label>
                                <select name="input_service" id="input_service" class="form-control form-control-default" placeholder="Pilih layanan" required="">
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Durasi</label>
                                <select class="selectpicker form-control" id="input_durasi" name="input_durasi" disabled="true"></select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Terapis</label>
                                    <select class="selectpicker form-control" id="input_terapis" name="input_terapis" disabled></select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <input class="selectpicker form-control" id="input_tanggal" name="input_tanggal" value="<?= date('d-M-Y', strtotime('now')); ?>" readonly disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jam</label>
                                <input type="text" class="form-control" id="input_jam" name="input_jam" disabled />
                                <button class="btn btn-primary" id="input_jam_b">Cari</button>
                                <small>Pilihan</small>
                                <div class="suggestion">
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" required>
                                            <div class="invalid-feedback">Nama harus diisi</div>
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
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Nomor Handphone" required>
                                            <div class="invalid-feedback">Nomor telepon tidak valid</div>
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
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                            <div class="invalid-feedback">Email tidak valid</div>
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
                    <button type="submit" class="btn btn-primary" id="checkout">Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h5>Rincian</h5>
                <span></span>
            </div>
            <div class="card-block">
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

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

    $(document).ready( function(){
        if (window.pageYOffset != 0)
        {
            $(".cs-navbar").addClass("cs-navbar-shadow");
        }

        function isNumeric(n) {
            return !isNaN(parseInt(n)) && isFinite(n);
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

        setTimeout(function () {
            $('.mobile-menu').trigger('click')
        }, 1000)

        $("#nextBtn").on('click', function (e) {
            getTotal($('#order_form').serialize())
        })

        $('#phone').on('keypress', function () {
            value = document.getElementById('phone').value
            if (!isNumeric(value)) {
                $(this).val('')
            }
        })

        $("#checkout").on('click', function (e) {
            e.preventDefault()
            checkOut($('#order_form').serialize())
        })

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
                '#input_tanggal',
                '#input_jam'
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
                    // $date.destroy()
                    // getDisabledDate(data)
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

        // var $date = $('#input_tanggal').datepicker({
        //     uiLibrary: 'bootstrap',
        //     showOtherMonths: true,
        //     value: formatDate(),
        //     format: 'dd/mm/yyyy',
        //     minDate: formatDate()
        // })

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

        // $('#input_jam').select2({
        //     placeholder: "Pilih Jam"
        // })

        var timepicker = $('#input_jam').timepicker({
            mode: "24hr",
            modal: true,
            select: function (e, type){
                enableForm([
                    '#input_kamar',
                    '.kamarInput',
                    '.next-btn'
                ])
            }
        })

        $('#input_jam_b').on('click', function(e){
            e.preventDefault()
            getAvailableTime(document.getElementById('input_jam'))
        })

        function getAvailableTime(elm = '') {
            service = $('#input_service').val()
            duration = $('#input_durasi').val()
            therapis = $('#input_terapis').val()
            date = $('#input_tanggal').val()
            time = elm.value
            url = "<?= base_url('api/getAvailableTime') ?>" + "?service_id=" + service + "&duration=" + duration + "&therapis_id=" + therapis + "&date=" + date + "&time=" + time
            console.log(timepicker.value())
            $.ajax({
                url: url,
                method: 'get',
                dataType: 'json',
                success: function (data) {
                    if (data.therapis) {
                        document.querySelector('#input_terapis')[0].value = data.therapis
                        result = data.data.results
                    } else {
                        if (data.results) {
                            result = data.results
                        } else {
                            result = {}
                        }
                    }
                    $('.suggestion').html()
                    var el = '<div class="row">'
                    for (var i = 0; i < result.length; i++) {
                        var t = result[i]
                        el += '<div class="col-sm-3 time-box" id="tb_'+ i +'">'
                        el += '<span>' + t.text + '</span>'
                        el += '</div>'
                    }
                    el += '</div>'
                    $('.suggestion').html(el)
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

        function checkOut(form) {
            $.ajax({
                url: "<?= base_url('api/checkOutService')?>",
                method: 'post',
                dataType: 'json',
                data: form,
                success: function (data) {
                    if (data.status) {
                        window.location.href = "<?= base_url('booking/invoice/')?>" + data.invoice
                    }
                }
            })
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