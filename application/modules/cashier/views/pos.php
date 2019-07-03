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
        border-radius: 4px;
        cursor: pointer;
    }

    .time-box.selected, .kamarInput.selected {
        background-color: #ddd;
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

</style>
<form class="form-material" id="order_form">
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-block">
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
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
                                <div class="mt-2 ml-1">
                                    <button class="btn btn-primary float-right" id="input_jam_b">Cari</button>
                                </div>
                                <small>Pilihan</small>
                                <div class="suggestion">
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kamar</label>
                                <input type="hidden" name="input_kamar" id="input_kamar">
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
                
                </div>
            </div>
        </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-block">
                <div class="form-group">
                    <label class="control-label">Detail</label>
                    <input type="text" name="detail" id="detail" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label">Harga</label>
                    <input type="text" class="form-control text-right" name="total_price" id="total_price" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label">Bayar</label>
                    <input type="text" class="form-control text-right" name="pay" id="pay">
                </div>
                <div class="form-group">
                    <label class="control-label">Kembali</label>
                    <input type="text" class="form-control text-right" name="change" id="change">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary float-right" id="proccess">Proses</button>
                </div>
            </div>
        </div>
    </div>
</form>
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

        $('#input_jam_b').on('click', function(e){
            e.preventDefault()
            getAvailableTime(document.getElementById('input_jam'))
        })

        $("#proccess").on('click', function (e) {
            e.preventDefault()
            console.log($('#order_form').serialize())
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
            $('#pay').val(null)
            $('#change').val(null)
            $('#total_price').val(null)
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
            $('#detail').val(data.text)
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
            s_text = $("#input_service option:selected").text();
            s_id = $("#input_service option:selected").val();
            $('#detail').val(s_text + ' x ' + data.text)
            getPrice(s_id, data.id)
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

        function getAvailableTime(elm = '') {
            service = $('#input_service').val()
            duration = $('#input_durasi').val()
            therapis = $('#input_terapis').val()
            date = $('#input_tanggal').val()
            time = elm.value
            url = "<?= base_url('api/getAvailableTime') ?>" + "?service_id=" + service + "&duration=" + duration + "&therapis_id=" + therapis + "&date=" + date + "&time=" + time
            $.ajax({
                url: url,
                method: 'get',
                dataType: 'json',
                success: function (data) {
                    if (data.therapis) {
                        document.querySelector('#input_terapis')[0].value = data.therapis[0]
                        if (data.data) {
                            result = data.data.results
                        } else {
                            result = data.results
                        }
                        
                    } else {
                        if (data.results) {
                            result = data.results
                        } else {
                            result = new Object()
                        }
                    }
                    $('.suggestion').html()
                    var el = '<div class="row">'
                    for (var i = 0; i < result.length; i++) {
                        var t = result[i]
                        el += '<div class="col-sm-3 time-box mb-2" id="tb_'+ i +'" data-time="'+t.id+'">'
                        el += '<span>' + t.text + '</span>'
                        el += '</div>'
                    }
                    el += '</div>'
                    $('.suggestion').html(el)
                }
            })
        }

        $(document).on('click', '.time-box', function () {
            service = $('#input_service').val()
            duration = $('#input_durasi').val()
            therapis = $('#input_terapis').val()
            date = $('#input_tanggal').val()
            time = $(this).data('time')
            $('.time-box').removeClass('selected')
            $(this).addClass('selected')
            $('#input_jam').val(time)
            $.ajax({
                url: "<?= base_url('api/getAvailableRooms'); ?>",
                dataType: 'json',
                method: 'GET',
                data: {
                    service_id: service,
                    duration: duration,
                    therapis_id: therapis,
                    date: date,
                    time: time
                },
                success: function (result) {
                    showAvailableRooms(result.results)
                    enableForm([
                        '.kamarInput'
                    ])
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

        $(document).on('click', '.kamarInput', function () {
            var selection = $('.kamarInput')
            var value = $(this).data('value')
            selection.removeClass('selected')
            $(this).addClass('selected')
            $('#input_kamar').val(value)
            enableForm([
                '.next-btn'
            ])
        })

        $(document).on('keyup', '#pay', function () {
            $(this).formatNumber()
            cash = $(this).cleanNumber(true)
            total = $('#total_price').cleanNumber(true)
            $('#change').formatNumber((cash - total).toString())
        })

        setInputFilter(document.getElementById("pay"), function(value) {
          return /^\d*\.?\d*$/.test(value);
        })

        function getPrice(s, d) {
            $.ajax({
                url: "<?= base_url('api/getPrice'); ?>",
                method: 'GET',
                data: {
                    service_id: s,
                    duration: d
                },
                success: function (data) {
                    $('#total_price').formatNumber(data.total)
                }
            })
        }

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

        String.prototype.addComma = function() {
          return this.replace(/(.)(?=(.{3})+$)/g,"$1,").replace(',.', '.');
        }

        $.fn.formatNumber = function (num) {
            if (!num) {
                return $(this).val($(this).val().replace(/(,|)/g,'').addComma())
            } else {
                return $(this).val(num.toString().replace(/(,|)/g,'').addComma())
            }
        }

        $.fn.cleanNumber = function(a) {
            if (!a) {
                return $(this).val($(this).val().replace(/(,| )/g,''));
            } else {
                return $(this).val().replace(/(,| )/g,'')
            }
            
        }

        function setInputFilter(textbox, inputFilter) {
          ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
              if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
              } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
              }
            });
          });
        }
    });
</script>